<?php
    Class SearchEngine {
        public function searchStory(){
            $command = escapeshellcmd('ProDS2.py');
            $output = shell_exec($command);
            echo $output;
        }
       
    }
?>