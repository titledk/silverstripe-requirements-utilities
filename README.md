# Silverstripe Requirements Utilities
Utilities for theme dependent bundled requirements.

# Example

```yml
---
name: requirements
---

RequirementsHelper:
  theme1:
    javascript-combined:
      lib:
        - "$ThemeDir/js/jquery.gmap.min.js"
        - "$ThemeDir/js/jquery.easing.1.3.js"
        - "$ThemeDir/js/jquery.lavalamp-1.3.5.min.js"
        - "$ThemeDir/js/superfish.js"
        - "$ThemeDir/js/jquery.quicksand.js"
        - "$ThemeDir/js/jquery.quicksand.init.js"
        - "$ThemeDir/js/jquery.hoverintent.min.js"
        - "$ThemeDir/js/jquery.scrollTo-1.4.2-min.js"
        - "$ThemeDir/js/jquery.footer.custom.js"
    css: 
      screen: "$ThemeDir/css/style.css"
      print: "$ThemeDir/css/print.css"
  theme2:
    javascript-combined:
      lib:
        - "$ThemeDir/bower_components/jquery-1.11.2.min/index.js"
        - "$ThemeDir/bower_components/foundation/js/foundation.min.js"
        - "$ThemeDir/bower_components/shufflejs/dist/jquery.shuffle.js"
        - "jreject/js/jquery.reject.js"
      app:
        - "$ThemeDir/js/app.js"
        - "$ThemeDir/js/titledk.mediaqueries.js"
        - "$ThemeDir/js/sw.slideout.js"
        - "$ThemeDir/js/jreject.js"
        - "$ThemeDir/js/pages/PortfolioPage.js"
    css-combined:
      lib:
        - "jreject/css/jquery.reject.css"
    css: 
      screen: "$ThemeDir/css/app.css"
      print: "$ThemeDir/css/print.css"

```


