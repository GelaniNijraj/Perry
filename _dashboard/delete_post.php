sadsd
<?php
/**
 * Created by Nijraj Gelani.
 * Date: 4/11/17
 * Time: 6:20 PM
 */

if(isset($_GET['post'])){
    $post = new Post($_GET['post']);
    if($post->author == User::getCurrentUser()->id) {
        $post->delete();
        header("Location: " . dashboard('posts'));
        exit();
    }
}
header("Location: /dashboard/");