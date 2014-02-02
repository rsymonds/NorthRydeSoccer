<!-- Start

//************************************************************
// Load reports
//************************************************************

function loadReports()
{
  var selectId = document.getElementById("reportList");

  addReport(selectId,"","Select another match report");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20080405.html","05 April 2008");
  addReport(selectId,"reports_20080412.html","12 April 2008");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20080503.html","03 May 2008");
  addReport(selectId,"reports_20080510.html","10 May 2008");
  addReport(selectId,"reports_20080517.html","17 May 2008");
  addReport(selectId,"reports_20080524.html","24 May 2008");
  addReport(selectId,"reports_20080531.html","31 May 2008");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20080607.html","07 June 2008");
  addReport(selectId,"reports_20080614.html","14 June 2008");
  addReport(selectId,"reports_20080628.html","28 June 2008");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20080705.html","05 July 2008");
  addReport(selectId,"reports_20080712.html","12 July 2008");
  addReport(selectId,"reports_20080719.html","19 July 2008");
  addReport(selectId,"reports_20080726.html","26 July 2008");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20080802.html","02 August 2008");
  addReport(selectId,"reports_20080809.html","09 August 2008");
}

//************************************************************
// Report functions
//************************************************************

function addReport(selectId,value,text)
{
  var opt = document.createElement("option");
  opt.value = value;
  opt.text = text;
  selectId.add(opt);
}

function openReportList()
{
  var selectId = document.getElementById("reportList");
  var url = selectId.options[selectId.selectedIndex].value;

  if (url != "")
  {
    window.location.assign(url);
  }
}

End -->