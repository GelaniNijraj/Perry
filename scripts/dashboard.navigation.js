/**
 * Created by buddha on 2/25/17.
 */

// var root = "http://127.0.0.1/Blog/dashboard";
var root = "http://127.0.0.1/dashboard";
var useHash = false;
var router = new Navigo(root, useHash);

//
// function getPage(url, parmas) {
//     $.post(url, parmas, function (output) {
//         $("#wrapper").html(output);
//     });
// }

// var list = document.getElementsByTagName("a");
//
// for(var i = 0; i < list.length; i++){
//     if(list[i].getAttribute("data-ajax") == ""){
//         list[i].onclick = function (e) {
//             e.preventDefault();
//             var item = e.target;
//             $.get(item.getAttribute("href"), function (output) {
//                 $("#wrapper").html(output);
//                 window.history.pushState({},"", "");
//             });
//         }
//     }
// }
//
//
// router
//     .on(function () {
//         getPage("all_blogs.php");
//     })
//     .on({
//         ":blog": function () {
//             getPage("/dashboard/blog.php");
//         }
//     })
//     .on({
//         "post/add": function () {
//             getPage("/dashboard/add_post.php")
//         },
//         "post/all": function () {
//             getPage("/dashboard/all_posts.php")
//         },
//         "post/edit/:id": function () {
//             getPage("/dashboard/edit_post.php")
//         },
//         "post/remove/:id": function () {
//             getPage("/dashboard/remove_post.php")
//         }
//     })
//     .on({
//         "/blogs": null,
//         "/blog/add": null,
//         "/blog/remove/:id": null
//     })
//     .resolve();
