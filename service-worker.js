/**
 * Check out https://googlechromelabs.github.io/sw-toolbox/ for
 * more info on how to use sw-toolbox to custom configure your service worker.
 */


'use strict';
importScripts('./build/sw-toolbox.js');

function store() {
    var newPost = ""; // Inputted values
    // Iterate through the inputs
    $("input").each(function() {
        newPost += $(this).val() + ",";
    });
    // Get rid of the last comma
    newPost = newPost.substr(0, newPost.length - 1);
    // Store the data
    localStorage.setItem('newPost', newPost);
}

self.toolbox.options.cache = {
  name: 'pwa-cache'
};

// pre-cache our key assets
self.toolbox.precache(
  [
    'index.php',
    'manifest.json',
    'video.js',
    'jquery-1.11.3.min.js',
    'web.config',
    'zxing.js'
  ]
);

// dynamically cache any other local assets
self.toolbox.router.any('/*', self.toolbox.fastest);

// for any other requests go to the network, cache,
// and then only use that cached resource if your user goes offline
self.toolbox.router.default = self.toolbox.networkFirst;

// Event listener for retrieving data
self.addEventListener('fetch', function(event) {
    var req = event.request.clone();
    if (req.clone().method == "GET") {
        event.respondWith(  
	    // Get the response from the network
	    return fetch(req.clone()).then(function(response) {
	       // And store it in the cache for later
		return cache.put(req.clone(), response);
	    });	
        );
    }
    if(req.clone().method == "POST"){
     event.respondWith(
    // Try to get the response from the network
    fetch(event.request.clone()).catch(function() {
	// If it doesn't work, post a failure message to the client
	self.clients.match(thisClient).then(function(client) {
    	    client.postMessage({
        	message: "Post unsuccessful.",
 		    alert: alert // A string we instantiated earlier
    	    });
	});
	// Respond with the page that the request originated from
	return caches.match(event.request.clone().referrer);
    });
);   
    }
});

navigator.serviceWorker.addEventListener('message', function(event) {
    alert(event.data.alert);
    store();
});
