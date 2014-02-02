<!-- Start

//************************************************************
// Load reports
//************************************************************

function loadReports()
{
  var selectId = document.getElementById("reportList");

  addReport(selectId,"","Select another match report");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20100410.html","10 April 2010");
  addReport(selectId,"reports_20100417.html","17 April 2010");
  addReport(selectId,"reports_20100424.html","24 April 2010");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20100501.html","01 May 2010");
  addReport(selectId,"reports_20100508.html","08 May 2010");
  addReport(selectId,"reports_20100515.html","15 May 2010");
  addReport(selectId,"reports_20100522.html","22 May 2010");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20100612.html","12 June 2010");
  addReport(selectId,"reports_20100619.html","19 June 2010");
  addReport(selectId,"reports_20100626.html","26 June 2010");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20100703.html","03 July 2010");
  addReport(selectId,"reports_20100710.html","10 July 2010");
  addReport(selectId,"reports_20100717.html","17 July 2010");
  addReport(selectId,"reports_20100724.html","24 July 2010");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_20100807.html","07 August 2010");
  addReport(selectId,"reports_20100814.html","14 August 2010");
  addReport(selectId,"","------------------");
  addReport(selectId,"reports_2010_grand_finals.html","GRAND FINALS");
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