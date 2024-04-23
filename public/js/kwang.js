function loadfile(event) {
  //https://www.youtube.com/watch?v=0dUP82dt8-4
  var output = document.getElementById("avtimg");
  output.src = URL.createObjectURL(event.target.files[0]);
}
var audios = []; // khai báo mảng

function song_show() {
  var song = document.getElementById("btnSong").files;
  var fileinfo = song[0].name.split("-"); // song tồn tại dưới dạng mảng select 1 file nên trỏ tới vị trí 0
  var name = fileinfo[0].trim();
  var artist = fileinfo[1].trim();
  $("#txtNameS").val(name);
  $("#txtArtistS").val(artist);
}

function audio_select() {
  //https://www.youtube.com/watch?v=YrXDECXjdm4
  var audio = document.getElementById("inpAudio").files;
  for (i = 0; i < audio.length; i++) {
    if (check_duplicate(audio[i].name)) {
      audios.push(audio[i]);
    } else {
      alert(audio[i].name + " is already added to the list");
    }
  }
  document.getElementById("audioplace").innerHTML += audio_show();
}

$(document).ready(function () {
  audio = document.getElementById("audio");
  audio.onplay = function () {
    var src = audio.src;
    var sub = src.split("/");
    var id = "";

    for (let index = 5; index < sub[sub.length - 1].length; index++) {
      if (sub[sub.length - 1][index] === ".") {
        break;
      }
      id += sub[sub.length - 1][index];
    }
    var count = 0;

    point = 0;
    myIn = setInterval(() => {
      point += 1;
      console.log("point" + point);
      if (point > audio.duration * 0.7) {
        count++;
        point = 0;
        console.log("count" + count);
        $.ajax({
          type: "GET",
          url: "index.php?c=album&a=countListen",
          dataType: "text",
          data: { id: id, count: count },
          success: function (response) {
            console.log(response);
          },
        });
        clearInterval(myIn);
      }
    }, 1000);
    audio.onpause = function () {
      clearInterval(myIn);
    };
  };
});

$(document).ready(function () {
  $(".btnEditDel").on("click", function () {
    //https://www.youtube.com/watch?v=-xULstkz-s4
    $(this).closest("tr").remove();
  });
  $("#btnSubmit").click(function () {
    var form_data = new FormData();
    var total = audios.length;
    console.log(total);
    for (let i = 0; i < total; i++) {
      form_data.append("inpAudio[]", audios[i]);
    }
    // console.log(form_data);
    $.ajax({
      url: "index.php?c=album&a=upload",
      type: "post",
      data: form_data,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (data) {
        ///st
      },
    });
  });
});
$(document).ready(function () {
  $("#btnEdit").click(function () {
    var form_data = new FormData();
    var total = audios.length;
    console.log(total);
    for (let i = 0; i < total; i++) {
      form_data.append("inpAudio[]", audios[i]);
    }
    // console.log(form_data);
    $.ajax({
      url: "index.php?c=album&a=edit",
      type: "post",
      data: form_data,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (data) {
        ///st
      },
    });
  });
});
$(document).ready(function () {
  var ad = $(".ad");
  var span = $(".duration");
  for (let i = 0; i < ad.length; i++) {
    var minutes = parseInt(ad[i].duration / 60);
    var seconds = parseInt(ad[i].duration % 60);

    span[i].textContent = minutes + ":" + seconds;
  }
});
// function audio_select() { //https://www.youtube.com/watch?v=YrXDECXjdm4
//     var audio = document.getElementById('inpAudio').files;
//     // console.log(audio);
//     for (i = 0; i < audio.length; i++) {
//         if (check_duplicate(audio[i].name)) {
//             audios.push({
//                 "name": audio[i].name,
//                 "url": URL.createObjectURL(audio[i]),
//                 "file": audio[i],
//             })
//         } else {
//             alert(audio[i].name + " is already added to the list");
//         }
//     }
//     // document.getElementById('form').reset();
//     // document.getElementById("inpAudio").value = null;
//     document.getElementById('audioplace').innerHTML = audio_show();

// }

function audio_show() {
  //https://www.youtube.com/watch?v=YrXDECXjdm4
  var audio = "";
  audios.forEach((i) => {
    // console.log(i.url);
    var subid = parseInt(
      $("#myTable > tbody > tr").last().children("td:first").find("span").text()
    );
    var id = (subid > 0 ? subid : 0) + 1 + parseInt(audios.indexOf(i));
    // var id = parseInt(audios.indexOf(i)) + 1;
    // var name = i.name.replace('-', ' ');
    var fileinfo = i.name.split("-");
    var name = fileinfo[0].trim();
    var artist = fileinfo[1].trim();

    audio +=
      `<tr>
        <td><span style="padding-left: 6px;" class="cart__price">` +
      id +
      `

        </td>
        <td>
            <div class="sign__group">
            <input id="txtSTitle" style="width:auto" type="text" name="txtSTitle[]" value= "` +
      name +
      `" class="sign__input">
            </div>
        </td>
        <td>
            <div class="sign__group">
            <input id="txtSArtist" style="width:auto" type="text" name="txtSArtist[]" value= "` +
      artist +
      `" class="sign__input">
            </div>        
        </td>

        <td><button  class="cart__delete" onclick=audio_delete(` +
      audios.indexOf(i) +
      `) type="button"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                    </path>
                </svg></button></td>
    </tr>`;
  });
  return audio;
}

function audio_delete(e) {
  //https://www.youtube.com/watch?v=YrXDECXjdm4
  audios.splice(e, 1);
  document.getElementById("audioplace").innerHTML = audio_show();
}

function check_duplicate(name) {
  //https://www.youtube.com/watch?v=YrXDECXjdm4
  var audio = true;
  if (audios.length > 0) {
    for (e = 0; e < audios.length; e++) {
      if (audios[e].name == name) {
        audio = false;
        break;
      }
    }
  }
  return audio;
}

// CKEDITOR.replace('txtAbout', {
//     language: 'es',
//     uiColor: '#25a56a',
//     removeButtons: 'PasteFromWord'

// });
// CKEDITOR.addCss(".cke_editable{background-color: black}");
// // e.editor.document.getBody().setStyle('color', 'white');

CKEDITOR.replace("txtAbout");
CKEDITOR.replace("txtAlbumAbout");
