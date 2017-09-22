<?php
if(isset($_POST['gitlog'])) {
    $config = array(
        'client_id' => '55506965e5724108dbe0',
        'client_secret' => '85175cc8c3d81e865c10cc497fe09caf177b2e48',
        'redirect_url' => 'http://localhost:8081/codeskool/codingskool/profile.php',
        'app_name' => 'codeskool'
    );
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if(isset($_GET['code']))
        {
            echo $_GET['code'];
            //$git = new githubApi($config);
           // $git->getUserDetails();
            //$_SESSION['github_data']=$git->getAllUserDetails();
            //header("location: home.php");
        }
        else
        {
            $url = "https://github.com/login/oauth/authorize?client_id=".$config['client_id']."&redirect_uri=".$config['redirect_url']."&scope=user";
            header("Location: $url");
        }
    }
}
?>