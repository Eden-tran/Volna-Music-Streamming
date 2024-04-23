$(document).ready(function () {
  function loadGenres() {
    $.ajax({
      url: "index.php?c=album&a=genresChange",
      type: "get",
      dataType: "text",
      data: {
        slGenres: $("#slGenres").val(),
      },
      success: function (result) {
        $("#releasePlace").html(result);
      },
    });
  }
  function LoadMore() {
    // var offset = 0;
    var offset = document.querySelectorAll(".artistL").length;
    var limit = 6;
    $.ajax({
      url: "index.php?c=artist&a=LoadMore",
      type: "get",
      dataType: "text",
      data: {
        limit: limit,
        offset: offset,
      },
      success: function (result) {
        $("#resArtist").append(result);
        // $(".artistL:last").scrollIntoView(true);
        var position = $("#artistLoadMore").position();
        var top = position.top;
        console.log(top);
        // document.getElementById("artistLoadMore").scrollIntoView(true);
        window.scrollTo(0, top - 100);
      },
    });
  }

  $("#artistLoadMore").click(function () {
    LoadMore();
  });

  $("#slGenres").change(function () {
    loadGenres();
  });
});
