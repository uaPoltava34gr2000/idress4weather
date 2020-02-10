$(function(){
/*
// Use the CDN or host the script yourself
// https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js
// https://matthewelsom.com/assets/js/libs/instafeed.min.js

  //5679701317 5679701317.8f4c5bf.69b3f2c784fe48df9aa9912635f1ffe0
  //https://api.instagram.com/v1/users/self/media/liked?access_token=ACCESS-TOKEN
*/
/*var userFeed = new Instafeed({
  get: 'user',
  userId: '7450567851',
  accessToken: '7450567851.1677ed0.ef957e1995de481c9522ae06a24d1508',
  resolution: 'standard_resolution',
  template: '<a href="{{link}}" target="_blank" id="{{id}}"><img src="{{image}}" /></a>',
  useHttp: "true",
  limit:60,
  links: false
});
userFeed.run();*/
  var galleryFeed = new Instafeed({
  get: "user",
  userId: '7450567851',
  accessToken: '7450567851.1677ed0.ef957e1995de481c9522ae06a24d1508',
  resolution: "standard_resolution",
  useHttp: "true",
  limit: 60,
  template: '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2"><div class="img-featured-container"><div class="img-backdrop"></div><div class="description-container"></div><img src="{{image}}" class="img-responsive"></div></a></div>',
  target: "instafeed-gallery-feed",
  links: false
});
galleryFeed.run();
});
