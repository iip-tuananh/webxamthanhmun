<!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<title>@yield('title')</title>

<!-- Favicon and touch Icons -->
<link rel="shortcut icon" href="{{@$config->favicon->path ?? ''}}" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="{{@$config->favicon->path ?? ''}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{@$config->favicon->path ?? ''}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{@$config->favicon->path ?? ''}}">
<meta name="application-name" content="{{ $config->web_title }}" />
<meta name="generator" content="@yield('title')" />

<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="@yield('image')">
<meta property="og:site_name" content="{{ url()->current() }}">
<meta property="og:image:alt" content="{{ $config->web_title }}">
<meta itemprop="description" content="@yield('description')">
<meta itemprop="image" content="@yield('image')">
<meta itemprop="url" content="{{ url()->current() }}">
<meta property="og:type" content="website" />
<meta property="og:locale" content="vi_VN" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ url()->current() }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">



<link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    rel="stylesheet"
/>


<link rel="stylesheet" href="/site/css/callbutton.css?v=12">

<!-- Styles Include -->
<link rel="stylesheet" href="/site/css/main.css">

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
/>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN', }, 'translate_select');
    }
</script>

<style>
    .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
        display: none;
    }
    .skiptranslate{
        display: none;
        top: 0;
    }
    .goog-te-banner-frame{display: none !important;}
    .goog-text-highlight { background: none !important; box-shadow: none !important;}
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    #goog-gt-tt{
        display: none !important;
    }
    body {
        position: revert!important;
        top: 0px !important;
    }

    /* Ẩn các phần tử có ng-cloak */
    [ng-cloak], .ng-cloak {
        display: none !important;
    }


</style>



