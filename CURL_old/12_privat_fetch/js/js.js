var urlPrivat = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
urlPrivat = "http://new-level.kh.ua/wp-json/wp/v2/posts/";
   fetch(urlPrivat, {metod: "get"})
  .then((response) => {
    let json = response.json();
    if (response.status >= 200 && response.status < 300) {
      return json;
    }
    else {
      return error;
    }
  }).then((json) => {
    console.log('json = ', json);
    let obj = "";
    // obj  = JSON.parse(json);
    console.log('is obj = ', typeof json);
    view(json);
  })
  .catch(function(error) {
    console.log('Fetch Error :-S', error);
  });