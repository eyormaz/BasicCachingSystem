<h2>About</h2>
<p>Simple and powerful cache class written for PHP5.</p>

<h2>Requirements</h2>
<ul>
  <li>PHP 5.2.x or higher</li>
</ul>

<h2>Example Usage</h2>

    <?
    $FileCache = new \Yormaz\FileCache("FileCaches");
    if($FileCache->Start("LoginLogs",60))
    {
    
      /* Your codes here */
    
    $FileCache->Ending("LoginLogs");
    }
    ?>
    
<h2>Parameters</h2>
<h3>Start Function</h3>

    Start($param1,$param2)
    $param1 = Cache name
    $param2 = Time in seconds
    
<h3>Ending Function</h3>

    Ending($param1)
    $param1 = Cache name
