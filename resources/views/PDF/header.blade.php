<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
    function subst() {
      var vars = {};
      var query_strings_from_url = document.location.search.substring(1).split('&');
      for (var query_string in query_strings_from_url)
      {
        if (query_strings_from_url.hasOwnProperty(query_string))
        {
          var temp_var = query_strings_from_url[query_string].split('=', 2);
          vars[temp_var[0]] = decodeURI(temp_var[1]);
        }
      }
      var css_selector_classes = ['page', 'frompage', 'topage', 'webpage', 'section', 'subsection', 'date', 'isodate', 'time', 'title', 'doctitle', 'sitepage', 'sitepages'];
      for (var css_class in css_selector_classes)
      {
        if (css_selector_classes.hasOwnProperty(css_class))
        {
          var element = document.getElementsByClassName(css_selector_classes[css_class]);
          for (var j = 0; j < element.length; ++j)
          {
              element[j].textContent = vars[css_selector_classes[css_class]];
          }
        }
      }
    }
  </script>
  </head>
  <body style="font-family: sans-serif; margin-top: 15px;">
    <div class="row">
        <div class="col-3 border">
            <img src="{{ asset('img/ENA.svg') }}" height="100px" width="175px" style="position: absolute">
        </div>
        <div class="col-6">
            <div class="flex-row">
                <center>
                    <h2>Centro Escolar Doctor Nicolás Aguilar</h2>
                </center>
            </div>
            <div class="flex-row">
                <center>
                    <span> Final 5°ta calle oriente B° El santuario, San Vicente, San Vicente</span>
                </center>
            </div>
        </div>
    </div>
    <div style="height: 35px; width: 100vw; border-bottom: 1px solid blue"></div>
  </body>
</html>
