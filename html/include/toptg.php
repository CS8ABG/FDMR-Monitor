<div class="container">
  <p id="tgcount"></p>
  <!-- this solves the footer issue -->
  <div><br></div>
</div>

<!-- this checks if id="tgcount" as content -->
<script>
  window.addEventListener('load', function () {
    setInterval(checkMainContent, 5000);
  });

  function checkMainContent() {
    var mainElement = document.getElementById('tgcount');
    if (mainElement && mainElement.innerHTML.trim() !== '') {
      // console.log('OKAY');
    } else {
      //console.log('NotOK');
      location.reload();
    }
  }
</script>