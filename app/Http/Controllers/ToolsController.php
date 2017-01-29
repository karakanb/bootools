<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller {
    public function Alphabetizer() {
        return view('tools.alphabetizer');
    }

    public function MailExtractor() {
        return view('tools.mail-extractor');
    }

    public function WordCounter() {
        return view('tools.word-counter');
    }

    public function KeywordMultiplier() {
        return view('tools.keyword-multiplier');
    }

    public function PostKeywordMultiplier(Request $request) {
        $data = $request->all();
        $options = array();
        if (isset($data['options'])) {
            $options = array_flip($data['options']);
            unset($data['options']);
        }

        foreach ($data as &$item) {
            $item = explode(PHP_EOL, $item);
            $item = array_filter($item, function ($value) {
                return $value !== '';
            });

            foreach ($item as $key => $word) {
                $word = trim(str_replace('\r', ' ', $word));
                if ($word == '') {
                    unset($item[$key]);
                } else {
                    $item[$key] = $word;
                }
            }
        }

        $data = array_values(array_filter($data));
        $multipliedResult = $this->concatRecursive($data, 0, $options);

        // Concatenate the input dataset.
        foreach ($data as $key => $value) {
            $data[$key] = implode(PHP_EOL, $value);
        }

        // Concatenate the multiplied result.
        $multipliedResult = ltrim(implode(PHP_EOL, $multipliedResult));
        //pd($multipliedResult);


        return view('tools.keyword-multiplier', compact('data', 'multipliedResult', 'options'));
    }

    public function StatusChecker(Request $request) {

        if($request->method() == "GET") {
            return view('tools.status-checker');
        }

        $maxURLNumber = 200;

        // Get the input URLs.
        $urls = $request->source;

        // Split the URLs into an array.
        $seperateURLs = preg_split('/\r\n|[\r\n]/', $urls);

        // Remove the empty records.
        $seperateURLs = array_filter($seperateURLs);

        // Format the URLs.
        foreach ($seperateURLs as &$url) {
            $url = trim($url);
            if (strpos($url, 'http') !== 0) {
                $url = 'http://' . $url;
            }
            if (substr($url, -1) != '/') {
                $url .= '/';
            }
        }
        // Remove the duplicates and rebase the index.
        $seperateURLs = array_values(array_unique($seperateURLs));
        if(!empty($seperateURLs)) {
            $seperateURLs = array_slice($seperateURLs, 0, $maxURLNumber);
            $seperateURLs = $this->CheckURLsInParallel($seperateURLs);
            uasort($seperateURLs, function ($a, $b) {
                return $b['statusCode'] - $a['statusCode'];
            });
        }


        return view('tools.status-checker', compact('seperateURLs', 'urls'));
    }

    private function CheckURLsInParallel($urls, $numberOfParallelURLs = 50) {

        // Maximum execution time.
        ini_set('max_execution_time', 300);

        // Create all the individual cURL handles and set their options
        $curl_handles = array();
        foreach ($urls as $url) {
            $curl_handles[$url] = curl_init();
            curl_setopt($curl_handles[$url], CURLOPT_URL, $url);
            curl_setopt($curl_handles[$url], CURLOPT_HEADER, true);
            curl_setopt($curl_handles[$url], CURLOPT_NOBODY, true);
            curl_setopt($curl_handles[$url], CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handles[$url], CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt($curl_handles[$url], CURLOPT_FOLLOWLOCATION, false);
            curl_setopt($curl_handles[$url], CURLOPT_TIMEOUT, 8000);
            curl_setopt($curl_handles[$url],CURLOPT_SSL_VERIFYPEER, false);
        }

        // Start going through the cURL handles and running them.
        $curl_multi_handle = curl_multi_init();

        $urlCounter = 0; // For matching the URL with its original one.
        $i = 0; // Count where we are in the list so we can break up the runs into smaller blocks
        $block = array(); // To accumulate the curl_handles for each group we'll run simultaneously
        $results = array();

        // Start the parallel requests.
        foreach ($curl_handles as $a_curl_handle) {
            $i++; // Increment the position-counter.

            // Add the handle to the curl_multi_handle and to our tracking "block".
            curl_multi_add_handle($curl_multi_handle, $a_curl_handle);
            $block[] = $a_curl_handle;

            // Check to see if we've got a "full block" to run or if we're at the end of out list of handles.
            if (($i % $numberOfParallelURLs == 0) or ($i == count($curl_handles))) {
                // -- run the block
                $running = NULL;
                do {
                    // Run the block or check on the running block and get the number of sites still running in $running.
                    curl_multi_exec($curl_multi_handle, $running);
                } while ($running > 0);

                // Once the number still running is 0, curl_multi_ is done, so check the results.
                foreach ($block as $handle) {
                    // Get the redirect URL.
                    $redirectURL = curl_getinfo($handle)['redirect_url'];

                    // The URL itself.
                    $url = curl_getinfo($handle, CURLINFO_EFFECTIVE_URL);

                    // HTTP response code
                    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

                    // Add it to the array.
                    $results[$urls[$urlCounter]] = array('statusCode' => $code,
                                                         'errorMessage' => curl_error($handle),
                                                         'redirectURL' => $redirectURL);

                    $urlCounter++;
                    // Remove the (used) handle from the curl_multi_handle.
                    curl_multi_remove_handle($curl_multi_handle, $handle);
                }

                // Reset the block to empty, since we've run its curl_handles
                $block = array();
            }
        }

        // Close the curl_multi_handle once we're done.
        curl_multi_close($curl_multi_handle);
        return $results;
    }


    /**
     * Calculate the combinations of words.
     * @param $array
     * @param $index
     * @param $options
     * @return array
     */
    private function concatRecursive($array, $index, $options) {
        if ($index == count($array)) return [''];
        $result = array();

        // Call the same function recursively with incremented index.
        foreach ($this->concatRecursive($array, $index + 1, $options) as $e) {
            foreach ($array[$index] as $k) {

                // Clear the extra spaces.
                $e = trim($e);

                // Create broad match version if asked.
                if (isset($options['broad'])) {
                    $result[] = $k . ' ' . $e;
                }

                // Set the BMM version if asked and it is the last loop this element goes through.
                if ($index == 0 AND isset($options['bmm'])) {
                    $exploded = explode(' ', $e);
                    $str = '+' . $k;
                    foreach ($exploded as $item) {
                        $str .= ' +' . $item;
                    }
                    $result[] = $str;
                }

                // Set the phrase version if asked and it is the last loop this element goes through.
                if ($index == 0 AND isset($options['phrase'])) {
                    $result[] = '"' . $k . ' ' . $e . '"';
                }

                // Set the exact version if asked and it is the last loop this element goes through.
                if ($index == 0 AND isset($options['exact'])) {
                    $result[] = '[' . $k . ' ' . $e . ']';
                }
            }
        }

        return $result;
    }

}


function pd($data) {
    pp($data);
    die();
}

function pp($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
