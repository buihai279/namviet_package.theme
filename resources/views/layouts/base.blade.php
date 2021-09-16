<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="/">
    <meta charset="utf-8"/>
    <title>
        {{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title –" : '' }}
        {{config('app.name')}}
    </title>
    <meta name="description"
          content="VTVTRAVEL"/>
    <meta name="keywords"
          content="VTVTRAVEL"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="vn_VN"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="VTVTRAVEL"/>
    <meta property="og:site_name" content="VTVTRAVEL"/>
    @yield('head')
</head>
@yield('body')
</html>
