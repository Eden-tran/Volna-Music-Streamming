<!-- breadcrumb -->

<?
if (isset($breadcrumb)) {
    echo '<div class="col-12">
        <ul class="breadcrumb">
            <li class="breadcrumb__item"><a href="' . url() . '">Home</a></li>
            <li class="breadcrumb__item breadcrumb__item--active">' . $breadcrumb . '</li>
        </ul>
    </div>';
}
if (isset($title)) {
    echo '<!-- title -->
    <div class="col-12">
        <div class="main__title main__title--page">
            <h1>' . $title . '</h1>
        </div>
    </div>
    <!-- end title -->';
}

?>

<!-- end breadcrumb -->