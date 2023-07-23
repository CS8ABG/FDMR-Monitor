<div class="container">
  <p id="statictg"></p>
  <!-- this solves the footer issue -->
  <div><br></div>
</div>

<!-- this checks if id="statictg" as content -->
<script>
  window.addEventListener('load', function () {
    setInterval(checkMainContent, 5000);
  });

  function checkMainContent() {
    var mainElement = document.getElementById('statictg');
    if (mainElement && mainElement.innerHTML.trim() !== '') {
      // console.log('OKAY');
    } else {
      //console.log('NotOK');
      location.reload();
    }
  }
</script>