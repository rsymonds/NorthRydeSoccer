<?php readfile("headerNSB.inc"); ?>
<!-- title -->

<?php $currentPage = 'U8RED'; 
include "sitemenu.inc";?>
<div class="clear below-page-top"></div>
				<div id="page-content" class="no-navigation">
					
					<div id="main">
						<div id="main-top"></div>
                            						<div id="main-content">
							<h2 class="title"><span class="in">U8 Red Fixtures</span></h2>
							<div class="article">
								<div class="article-content">
									<div class="RichTextElement">
										<div>
											<?php 
											$agegroup = 'Under 8';
											$division = 'Red';
											$year = '2013';
											include "fixtures.inc"; ?>
										</div>
									</div>
								</div> <!-- /article-content -->
								<div class="article-info">
								</div> <!-- /article-info -->
							</div> <!-- /article -->
							
							<h2 class="title"><span class="in">Match Reports</span></h2>
											<?php 
											
											include "report.inc"; ?>
										</div>
									</div>
								</div> <!-- /article-content -->
								<div class="article-info">
								</div> <!-- /article-info -->
							</div> <!-- /article -->
							
						</div> <!-- main-content -->
						<div id="main-bottom"></div>
					</div> <!-- main -->
				</div> <!-- content -->
									
				
				
<?php readfile("footer.inc"); ?>