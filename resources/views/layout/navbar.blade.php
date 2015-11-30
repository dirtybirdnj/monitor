<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Internet Monitor</a>
    </div>
    
    <div id="navbar" class="navbar-collapse collapse">
	<!--
      <ul class="nav navbar-nav navbar-right">   
	    <li><a href="/">Dashboard</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Logout</a></li> 
      </ul>-->
      <form class="navbar-form navbar-right">
        <!-- <input type="text" class="form-control" placeholder="Search Hosts..."> -->
        <div class="btn-group" role="group" aria-label="...">
		  <a href="/scans/start" class="btn <?php echo $activeScan ? 'btn-success' : 'btn-default' ?>">Scan On</a>
		  <a href="/scans/stop" class="btn <?php echo !is_null($activeScan) ? 'btn-default' : 'btn-danger' ?>">Scan Off</a>
		</div>
      </form>

    </div>
  </div>
</nav>