// This is the service worker with the Cache-first network


const CACHE = "pwa-precache";
const precacheFiles = [
  /* Add an array of files to precache for your app */
'/js/jquery.js',
'/js/jquery_ui.js',
'/js/product.php',
'/css/blog.css',
'/assets/alertify/themes/alertify.core.css',
'/css/hover.css',
'/css/animate.css',
'/css/jquery-ui.css',
'/css/vmenuModule.css',
'/css/jquery.fancybox.css',
'/css/mmenu.css',
'/css/fontawesome.css',
'/css/owl.theme.css',
'myAdmin/assets/bootstrap/css/bootstrap.min.css',
'myAdmin/assets/bootstrap/css/bootstrap-theme.min.css',
'/css/owl.carousel.min.css',
'/js/js.cookie.min.js',
'/js/classie.js',
'/js/sidebarEffects.js',
'/js/lazy-load-images.min.js',
'/js/script.js',
'/css/cloudzoom.css',
'/css/lazy-load-images.min.css',
'/js/cloudzoom.js',
'/js/mainTabs.js',
'/css/paypal.css',
'/css/category/categoryStyle1.css',
'/css/category/categoryStyle2.css',
'/css/category/category2.js',
'/myAdmin/assets/font-awesome/css/font-awesome.css',
'/myAdmin/assets/jquery-ui/css/jquery-ui-1.11.0.css',
'/myAdmin/assets/bootstrap/css/bootstrap.css',
'/myAdmin/assets/bootstrap/css/bootstrap-theme.css',
'/myAdmin/assets/bootstrap/css/bootstrap.css.map',
'/myAdmin/js/jquery.cookie.js',
'/myAdmin/js/angular.min.js',
'/myAdmin/js/angularApp.js',
'/myAdmin/assets/jstree/themes/default/style.min.css',
'/myAdmin/assets/jstree/jstree.js',
'/myAdmin/assets/colorpicker/js/colorpicker.js',
'/myAdmin/assets/colorpicker/css/colorpicker.css',
'/myAdmin/ajaxFileUpload/css/styles.css',
'/myAdmin/ajaxFileUpload/js/jquery.filedrop.js',
'/myAdmin/ajaxFileUpload/js/script.js',
'/myAdmin/assets/bs-switch/bootstrap-switch.3.0.css',
'/myAdmin/assets/bs-switch/bootstrap-switch.3.0.js',
'/myAdmin/editor/ckeditor.js',
'/myAdmin/assets/data_table_bs/colVis/dataTables.colVis.min.css',
'/myAdmin/assets/data_table_bs/DT_bootstrap.css',
'/myAdmin/assets/data_table_bs/jquery.dataTables.1.10.2.min.js',
'/myAdmin/assets/data_table_bs/dataTables.tableTools.2.2.2.min.js',
'/myAdmin/assets/data_table_bs/colVis/dataTables.colVis.min.js',
'/myAdmin/assets/data_table_bs/DT_bootstrap.js',
'/myAdmin/assets/bootstrap-duallistbox/dist/jquery.bootstrap-duallistbox.min.js',
'/myAdmin/assets/bootstrap-duallistbox/src/bootstrap-duallistbox.css',
'/myAdmin/assets/jquery-ui/js/jquery-ui.1.11.1.min.js',
'/myAdmin/assets/bootstrap/js/bootstrap.js',
'/myAdmin/css/bootstrap-select.min.css',
'/myAdmin/js/bootstrap-select.min.js',
'/myAdmin/assets/bootstrap-multiselect-master/dist/js/bootstrap-multiselect.js',
'/myAdmin/assets/alertify/lib/alertify.min.js'
    // ,
   
];
self.addEventListener("install", function (event) {
  console.log("[PWA] Install Event processing");

  console.log("[PWA] Skip waiting on install");
  self.skipWaiting();

  event.waitUntil(
    caches.open(CACHE).then(function (cache) {
      console.log("[PWA] Caching pages during install");
      return cache.addAll(precacheFiles);
    })
  );
});

// Allow sw to control of current page
self.addEventListener("activate", function (event) {
  console.log("[PWA] Claiming clients for current page");
  event.waitUntil(self.clients.claim());
});

// If any fetch fails, it will look for the request in the cache and serve it from there first
self.addEventListener("fetch", function (event) { 
  if (event.request.method !== "GET") return;

  event.respondWith(
    fromCache(event.request).then(
      function (response) {
        // The response was found in the cache so we responde with it and update the entry

        // This is where we call the server to get the newest version of the
        // file to use the next time we show view
        event.waitUntil(
          fetch(event.request).then(function (response) {
            return updateCache(event.request, response);
          })
        );

        return response;
      },
      function () {
        // The response was not found in the cache so we look for it on the server
        return fetch(event.request)
          .then(function (response) {
            // If request was success, add or update it in the cache
            event.waitUntil(updateCache(event.request, response.clone()));

            return response;
          })
          .catch(function (error) {
            console.log("[PWA] Network request failed and no cache." + error);
          });
      }
    )
  );
});


function fromCache(request) {
  // Check to see if you have it in the cache
  // Return response
  // If not in the cache, then return
  return caches.open(CACHE).then(function (cache) {
    return cache.match(request).then(function (matching) {
      if (!matching || matching.status === 404) {
        return Promise.reject("no-match");
      }

      // return matching;
      // return matching || fetch(event.request);
      fetch(event.request);
    });
  });
}

function updateCache(request, response) {
  return caches.open(CACHE).then(function (cache) {
    return cache.put(request, response);
  });
}