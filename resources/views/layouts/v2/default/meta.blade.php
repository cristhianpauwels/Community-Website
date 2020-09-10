
<script async src="https://use.fontawesome.com/e8189963c5.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<link rel="shortcut icon" type="image/png" href="{{GameserverApp\Helpers\SiteHelper::favicon()}}"/>
<link rel="apple-touch-icon" href="/img/shortcut-icon.png">
<meta name="apple-mobile-web-app-title" content="{{GameserverApp\Helpers\SiteHelper::name()}}">

<meta name="description" content="{{$page['description'] or ''}}">

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "{{url('/')}}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{url('/')}}/{{GameserverApp\Helpers\RouteHelper::inspector()}}?search={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

<title>{{$page['title'] or 'ARK: Survival Evolved'}} - {{GameserverApp\Helpers\SiteHelper::name()}}</title>

<link rel="stylesheet" type="text/css" href="{{ mix('css/style.css') }}">

@if(!is_null(GameserverApp\Helpers\SiteHelper::customCssUrl()) and !empty(GameserverApp\Helpers\SiteHelper::customCssUrl()) )
    <link rel="stylesheet" type="text/css" href="{{ GameserverApp\Helpers\SiteHelper::customCssUrl() }}">
@endif

<style rel="stylesheet" type="text/css">
    body *:not(.fa):not(.fc-icon) {
        font-family: "{{ GameserverApp\Helpers\SiteHelper::googleFont() }}" !important;
    }

    @if(!is_null(GameserverApp\Helpers\SiteHelper::customCss()) and !empty(GameserverApp\Helpers\SiteHelper::customCss()) )
        {{ GameserverApp\Helpers\SiteHelper::customCss() }}
    @endif
</style>

<link href='{{GameserverApp\Helpers\SiteHelper::googleFontsUrl()}}' rel='stylesheet' type='text/css'>

@if(!is_null(GameserverApp\Helpers\SiteHelper::googleAnalyticsId()))
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '{{GameserverApp\Helpers\SiteHelper::googleAnalyticsId()}}', 'auto');
        ga('send', 'pageview');

    </script>
@endif

@if(!is_null(GameserverApp\Helpers\SiteHelper::hotjarId()))
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:{{GameserverApp\Helpers\SiteHelper::hotjarId()}},hjsv:5};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
@endif