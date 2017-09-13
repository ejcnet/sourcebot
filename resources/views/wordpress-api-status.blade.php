<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sourcebot</title>
    <link rel="stylesheet" href="/css/github-markdown.css">
    <style>
      .markdown-body {
        box-sizing: border-box;
        min-width: 200px;
        max-width: 980px;
        margin: 0 auto;
        padding: 45px;
      }

      @media (max-width: 767px) {
        .markdown-body {
          padding: 15px;
        }
      }
    </style>
  </head>
  <body>
    <article class="markdown-body">
      <h1>Sourcebot</h1>
      <ol>
        <li>Starting check</li>
        <?php
        if (config('wordpress.api_host')) {
            $client = new \GuzzleHttp\Client();
            $request_host = config('wordpress.api_host');
            echo '<li><code>WORDPRESS_API_HOST</code> set to <code>'.$request_host.'</code></li>';
            $request_url = $request_host.'/wp-json/wp/v2/';
            echo '<li>Attempting to <code>GET</code> <code>'.$request_url.'</code></li>';
            try {
                $res = $client->request('GET', $request_url);
                $json_body = json_decode($res->getBody(), true);

                if ($json_body['namespace'] == 'wp/v2') {
                    $msg = 'Wordpress REST API verified';
                } else {
                    $msg = 'This does not look like the <a href="https://wordpress.org/plugins/rest-api/">Wordpress REST
                            API</a> v2';
                }
            } catch (GuzzleHttp\Exception\ClientException $e) { #good
                $res = $e->getResponse();
                $msg = 'Could not <code>GET</code> resource';
                $suggestion = 'Is <code>'.$request_host.'</code> running Wordpress and the
                                <a href="https://wordpress.org/plugins/rest-api/">Wordpress REST API</a> plugin?';
            } catch (GuzzleHttp\Exception\ConnectException $e) { #good
                $res = $e->getResponse();
                $msg = 'Connection exception';
                $suggestion = '<code>WORDPRESS_API_HOST</code> is probably invalid. It should be something like
                                <code>https://yourwebsite.com/</code>';
            } catch (Exception $e) {
                $res = $e->getResponse();
                $msg_full = $e->getMessage();
                $suggestion = 'Please check your server and that <code>WORDPRESS_API_HOST</code> is set to something
                                 like <code>https://yourwebsite.com/</code>';
            } finally {
                if (isset($res)) {
                    echo '<li>HTTP Status Code: <code>'.$res->getStatusCode().'</code></li>';
                }
                if (isset($suggestion)) {
                    echo '<li>'.$suggestion.'</li>';
                }
                if (isset($msg)) {
                    echo '<li>'.$msg.'</li>';
                }
                if (isset($msg_full)) {
                    echo '<li><iframe srcdoc="'.$msg_full.'"></iframe></li>';
                }
            }
        } else { #good
            $error = 'Please set <code>WORDPRESS_API_HOST</code> to something like
                        <code>https://yourwebsite.com</code>';
            Log::info($error);
            echo '<li>'.$error.'</li>';
        }
        ?>
        <li>Finished check</li>
      </ol>
    </article>
  </body>
</html>
