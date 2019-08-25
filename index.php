<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>

<?php
    $hd=opendir("src/");
    $fileList=array();
    $index=0;
    while( $fileName=readdir($hd))
    {   
        if(preg_match("/.*\.mp3/",$fileName))
        {
            $fileList[$index]=substr($fileName,0,strripos($fileName,".mp3"));
            $index+=1;
        }
    }
    sort($fileList,2);
    $srcName=$fileList[0];


?>
<head>

    <title></title>
    <link rel="stylesheet" type="text/css" href="plugin/css/style.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="plugin/jquery-jplayer/jquery.jplayer.js"></script>
    <script type="text/javascript" src="plugin/ttw-music-player.js"></script>
    <script type="text/javascript" src="js/myplaylist.js"></script>
    <script>

function setMusicVolume(x)
{
    document.getElementById('jp_audio_0').volume=(x/100);
}

myPlaylist=
[
<?php

    for($i=0;$i<count($fileList);$i++)
    {
        if($i>0)
        echo ',';
        echo "{mp3:\"src/$fileList[$i].mp3\",title:\"$fileList[$i]\"}";
    }

?>
];

for(i=myPlaylist.length-1;i>=0;i--)
{
    idx=Math.floor(i*Math.random());
    tmp=myPlaylist[i];
    myPlaylist[i] = myPlaylist[idx];
    myPlaylist[idx]=tmp;
}
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id tortor nisi. Aenean sodales diam ac lacus elementum scelerisque. Suspendisse a dui vitae lacus faucibus venenatis vel id nisl. Proin orci ante, ultricies nec interdum at, iaculis venenatis nulla. ';

            $('body').ttwMusicPlayer(myPlaylist, {
                autoPlay:false, 
                description:description,
                jPlayer:{
                    swfPath:'plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
        });
    </script>
</head>
<body>

<div id="title"></div>
</body>
</html>
