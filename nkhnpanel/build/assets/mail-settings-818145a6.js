(function(){let a=function(e){var t=new FileReader;t.onload=function(){var l=document.getElementById("profile-img");e.target.files[0].type.match("image.*")?l.src=t.result:(e.target.value="",alert("please select a valid image"))},e.target.files[0]&&t.readAsDataURL(e.target.files[0])};new Choices("#language",{allowHTML:!0,removeItemButton:!0}),new Choices("#mail-language",{allowHTML:!0,removeItemButton:!0}),document.querySelector("#profile-change").addEventListener("change",a)})();
