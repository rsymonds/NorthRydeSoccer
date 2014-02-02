//************************************************************
// Menu variables
//************************************************************
var NoOfFirstLineMenus=15;         // Number of first level items
var LowBgColor='#003399';          // Background color when mouse is not over
var LowSubBgColor='#003399';       // Background color when mouse is not over on subs
var HighBgColor='#ffd700';         // Background color when mouse is over
var HighSubBgColor='#ffd700';      // Background color when mouse is over on subs
var FontLowColor='#ffd700';        // Font color when mouse is not over
var FontSubLowColor='#ffd700';     // Font color subs when mouse is not over
var FontHighColor='#000000';       // Font color when mouse is over
var FontSubHighColor='#000000';    // Font color subs when mouse is over
var BorderColor='#255282';         // Border color
var BorderSubColor='#255282';      // Border color for subs
var BorderWidth=1;                 // Border width
var BorderBtwnElmnts=1;            // Border between elements 1 or 0
var FontFamily="verdana,helvetica,arial,sans-serif"  // Font family menu items
var FontSize=7.5;                  // Font size menu items
var FontBold=1;                    // Bold menu items 1 or 0
var FontItalic=0;                  // Italic menu items 1 or 0
var MenuTextCentered='left';       // Item text position: left, center or right
var MenuCentered='left';           // Menu horizontal position 'left', 'center' or 'right'
var MenuVerticalCentered='top';    // Menu vertical position 'top', 'middle','bottom' or static
var ChildOverlap=0;                // horizontal overlap
var ChildVerticalOverlap=0;        // vertical overlap
var StartTop=170;                  // Menu offset x coordinate
var StartLeft=0;                   // Menu offset y coordinate
var VerCorrect=0;                  // Multiple frames y correction
var HorCorrect=0;                  // Multiple frames x correction
var LeftPaddng=6;                  // Left padding
var TopPaddng=3;                   // Top padding
var FirstLineHorizontal=0;         // set to 1 for horizontal menu, 0 for vertical
var MenuFramesVertical=1;          // Frames in cols or rows 1 or 0
var DissapearDelay=400;            // delay before menu folds in
var TakeOverBgColor=1;             // Menu frame takes over background color subitem frame
var FirstLineFrame='navig';        // Frame where first level appears
var SecLineFrame='space';          // Frame where sub levels appear
var DocTargetFrame='space';        // Frame where target documents appear
var TargetLoc='';                  // span id for relative positioning
var HideTop=0;                     // Hide first level when loading new document 1 or 0
var MenuWrap=1;                    // enables/disables menu wrap
var RightToLeft=0;                 // enables/disables right to left unfold 1 or 0
var UnfoldsOnClick=0;              // Level 1 unfolds onclick/onmouseover
var WebMasterCheck=0;              // menu tree checking
var ShowArrow=0;                   // Enable arrow images
var KeepHilite=1;                  // Keep selected path highligthed
var Arrws=['right.gif',5,10,'down.gif',10,5,'left.gif',5,10]; // Arrow source, width and height

//************************************************************
// User-defined functions
//************************************************************
function BeforeStart(){return}
function AfterBuild(){return}
function BeforeFirstOpen(){return}
function AfterCloseAll(){return}

//************************************************************
// Menu(n) = new Array(text,link,image,#submenus,height,width)
// For rollover images set text to: "rollover:image1:image2"
//************************************************************
Menu1            = new Array("CLUB DETAILS","../../club_details.html","",3,20,135);
Menu1_1          = new Array("About",       "../../club_details_about.html","",0,20,64);
Menu1_2          = new Array("Contacts",    "../../club_details_contacts.html","",0);
Menu1_3          = new Array("History",     "../../club_details_history.html","",0);

Menu2            = new Array("NEWS","../../news.html","",0);

Menu3            = new Array("EVENTS",              "../../events.html","",1);
Menu3_1          = new Array("Masquerade and Games","../../events_masquerade.html","",0,20,149);

Menu4            = new Array("TRAINING","../../training.html","",0);

Menu5            = new Array("OFFICIALS","../../officials.html","",0);

Menu6            = new Array("GROUNDS",          "../../grounds.html","",3);
Menu6_1          = new Array("Magdala",          "../../grounds_magdala.html","",0,20,116);
Menu6_2          = new Array("GHFA",             "../../grounds_ghfa.html","",0);
Menu6_3          = new Array("Maps & Directions","../../grounds_maps.html","",0);

Menu7            = new Array("CANTEEN", "","",0);
Menu7_1          = new Array("Menu",    "../../canteen_menu.html","",0,20,84);
Menu7_2          = new Array("Roster",  "../../canteen_roster.html","",0);
Menu7_3          = new Array("Links",   "../../canteen_links.html","",0);

Menu8            = new Array("FIXTURES & RESULTS","../../results.html","",12);
Menu8_1          = new Array("Under 6",           "../../results_u6.html","",7,20,94);
Menu8_1_1        = new Array("Green",             "../../results_u6.html#green","",0,20,62);
Menu8_1_2        = new Array("Purple A",          "../../results_u6.html#purplea","",0);
Menu8_1_3        = new Array("Purple B",          "../../results_u6.html#purpleb","",0);
Menu8_1_4        = new Array("Red A",             "../../results_u6.html#reda","",0);
Menu8_1_5        = new Array("White A",           "../../results_u6.html#whitea","",0);
Menu8_1_6        = new Array("White B",           "../../results_u6.html#whiteb","",0);
Menu8_1_7        = new Array("White C",           "../../results_u6.html#whitec","",0);
Menu8_2          = new Array("Under 7",           "../../results_u7.html","",6);
Menu8_2_1        = new Array("Green",             "../../results_u7.html#green","",0,20,59);
Menu8_2_2        = new Array("Red A",             "../../results_u7.html#reda","",0);
Menu8_2_3        = new Array("Red B",             "../../results_u7.html#redb","",0);
Menu8_2_4        = new Array("White A",           "../../results_u7.html#whitea","",0);
Menu8_2_5        = new Array("White B",           "../../results_u7.html#whiteb","",0);
Menu8_2_6        = new Array("White C",           "../../results_u7.html#whitec","",0);
Menu8_3          = new Array("Under 8",           "../../results_u8.html","",5);
Menu8_3_1        = new Array("Brown",             "../../results_u8.html#brown","",0,20,56);
Menu8_3_2        = new Array("Orange",            "../../results_u8.html#orange","",0);
Menu8_3_3        = new Array("Purple",            "../../results_u8.html#purple","",0);
Menu8_3_4        = new Array("Red",               "../../results_u8.html#red","",0);
Menu8_3_5        = new Array("Yellow",            "../../results_u8.html#yellow","",0);
Menu8_4          = new Array("Under 9",           "../../results_u9.html","",4);
Menu8_4_1        = new Array("Division 1",        "../../results_u9.html#div1","",0,20,68);
Menu8_4_2        = new Array("Division 3",        "../../results_u9.html#div3","",0);
Menu8_4_3        = new Array("Division 6",        "../../results_u9.html#div6","",0);
Menu8_4_4        = new Array("Division 8",        "../../results_u9.html#div8","",0);
Menu8_5          = new Array("Under 10",          "../../results_u10.html","",1);
Menu8_5_1        = new Array("Division 6",        "../../results_u10.html#div6","",0,20,68);
Menu8_6          = new Array("Under 11",          "../../results_u11.html","",3);
Menu8_6_1        = new Array("Division 1",        "../../results_u11.html#div1","",0,20,68);
Menu8_6_2        = new Array("Division 3",        "../../results_u11.html#div3","",0);
Menu8_6_3        = new Array("Division 5",        "../../results_u11.html#div5","",0);
Menu8_7          = new Array("Under 12",          "../../results_u12.html","",1);
Menu8_7_1        = new Array("Division 1",        "../../results_u12.html#div1","",0,20,68);
Menu8_8          = new Array("Under 12 Girls",    "../../results_u12g.html","",0);
Menu8_9          = new Array("Under 13",          "../../results_u13.html","",1);
Menu8_9_1        = new Array("Division 2",        "../../results_u13.html#div2","",0,20,68);
Menu8_10         = new Array("Under 15",          "../../results_u15.html","",1);
Menu8_10_1       = new Array("Division 2",        "../../results_u15.html#div2","",0,20,68);
Menu8_11         = new Array("All Age",           "../../results_aa.html","",4);
Menu8_11_1       = new Array("Division 3",        "../../results_aa.html#div3","",0,20,76);
Menu8_11_2       = new Array("Division 5",        "../../results_aa.html#div5","",0);
Menu8_11_3       = new Array("Division 8",        "../../results_aa.html#div8","",0);
Menu8_11_4       = new Array("Division 17",       "../../results_aa.html#div17","",0);
Menu8_12         = new Array("Over 35",           "../../results_o35.html","",3);
Menu8_12_1       = new Array("Division 2",        "../../results_o35.html#div2","",0,20,68);
Menu8_12_2       = new Array("Division 6",        "../../results_o35.html#div6","",0);
Menu8_12_3       = new Array("Division 8",        "../../results_o35.html#div8","",0);

Menu9            = new Array("MATCH REPORTS", "../../reports.html","",15);
Menu9_1          = new Array("02 Apr 2011",   "../../reports_20110402.html","",0,20,83);
Menu9_2          = new Array("09 Apr 2011",   "../../reports_20110409.html","",0);
Menu9_3          = new Array("07 May 2011",   "../../reports_20110507.html","",0);
Menu9_4          = new Array("14 May 2011",   "../../reports_20110514.html","",0);
Menu9_5          = new Array("21 May 2011",   "../../reports_20110521.html","",0);
Menu9_6          = new Array("28 May 2011",   "../../reports_20110528.html","",0);
Menu9_7          = new Array("04 Jun 2011",   "../../reports_20110604.html","",0);
Menu9_8          = new Array("11 Jun 2011",   "../../reports_20110611.html","",0);
Menu9_9          = new Array("25 Jun 2011",   "../../reports_20110625.html","",0);
Menu9_10         = new Array("02 Jul 2011",   "../../reports_20110702.html","",0);
Menu9_11         = new Array("09 Jul 2011",   "../../reports_20110709.html","",0);
Menu9_12         = new Array("16 Jul 2011",   "../../reports_20110716.html","",0);
Menu9_13         = new Array("30 Jul 2011",   "../../reports_20110730.html","",0);
Menu9_14         = new Array("06 Aug 2011",   "../../reports_20110806.html","",0);
Menu9_15         = new Array("13 Aug 2011",   "../../reports_20110813.html","",0);

Menu10           = new Array("GALLERIES",       "../../galleries.html","",1);
Menu10_1         = new Array("Pic of the Week", "../../galleries_pic_of_the_week.html","",0,20,104);

Menu11           = new Array("VIDEOS",         "../../videos.html","",0);
Menu11_1         = new Array("16 May 2009",    "","",1,20,102);
Menu11_1_1       = new Array("U9 Div4",        "../../videos_20090516_u9_div4.html","",0,20,58);
Menu11_2         = new Array("15 August 2009", "","",1);
Menu11_2_1       = new Array("U9 Div1",        "","",2,20,58);
Menu11_2_1_1     = new Array("Medium (5.3MB)", "../../videos_20090815_u9_div1_medium.html","",0,20,105);
Menu11_2_1_2     = new Array("High (9.3MB)",   "../../videos_20090815_u9_div1_high.html","",0);

Menu12           = new Array("LIBRARY",                 "../../library.html","",7);
Menu12_1         = new Array("Registration Info",       "","",4,20,125);
Menu12_1_1       = new Array("2012 Rego Fees",          "../../documents/library/2012_registration_fees.pdf","",0,20,136);
Menu12_1_2       = new Array("2012 Rego Form",          "../../documents/library/2012_registration_form.pdf","",0);
Menu12_1_3       = new Array("2012 Insurance Form",     "../../documents/library/2012_insurance_form.pdf","",0);
Menu12_1_4       = new Array("FFA Rego Form",           "../../documents/library/ffa_registration_form.pdf","",0);
Menu12_2         = new Array("Substitution Sheets",     "","",5);
Menu12_2_1       = new Array("Four-a-Side",             "../../documents/library/substitution_sheet_4_a_side.pdf","",0,20,92);
Menu12_2_2       = new Array("Five-a-Side",             "../../documents/library/substitution_sheet_5_a_side.pdf","",0);
Menu12_2_3       = new Array("Seven-a-Side",            "../../documents/library/substitution_sheet_7_a_side.pdf","",0);
Menu12_2_4       = new Array("Nine-a-Side",             "../../documents/library/substitution_sheet_9_a_side.pdf","",0);
Menu12_2_5       = new Array("Eleven-a-Side",           "../../documents/library/substitution_sheet_11_a_side.pdf","",0);
Menu12_3         = new Array("Minis Ideas & Info",      "","",5);
Menu12_3_1       = new Array("Awards & Certificates",   "../../documents/library/award_certificate_ideas.doc","",0,20,150);
Menu12_3_2       = new Array("Certificate Template",    "../../documents/library/award_certificate_template.ppt","",0);
Menu12_3_3       = new Array("Player Of The Week",      "../../documents/library/award_player_of_the_week.pdf","",0);
Menu12_3_4       = new Array("Small Sided Game Guide",  "../../documents/library/small_sided_games_quick_guide.doc","",0);
Menu12_3_5       = new Array("Small Sided Game Hints",  "../../documents/library/small_sided_games_helpful_hints.pdf","",0);
Menu12_4         = new Array("Info for Officials",       "","",3);
Menu12_4_1       = new Array("Managers Duties - Minis", "../../documents/library/manager_duties_minis.doc","",0,20,148);
Menu12_4_2       = new Array("General Guidelines",      "../../documents/library/coaches_and_officials_guidelines.doc","",0);
Menu12_4_3       = new Array("Season Preparation",      "../../documents/library/coaches_and_managers_season_preparation.pdf","",0);
Menu12_5         = new Array("Canteen",                 "","",4);
Menu12_5_1       = new Array("Canteen Opening Hours",   "../../documents/library/canteen_hours.doc","",0,20,147);
Menu12_5_2       = new Array("Canteen Instructions",    "../../documents/library/canteen_instructions.doc","",0);
Menu12_5_3       = new Array("Canteen Roster Form",     "../../documents/library/canteen_roster_form.doc","",0);
Menu12_5_4       = new Array("Canteen Contacts",        "../../documents/library/canteen_contacts.doc","",0);
Menu12_6         = new Array("General Documents",       "","",5);
Menu12_6_1       = new Array("NRSC Declaration",        "../../documents/library/nrsc_declaration.pdf","",0,20,151);
Menu12_6_2       = new Array("WWC Declaration",         "../../documents/library/working_with_children_declaration.pdf","",0);
Menu12_6_3       = new Array("Code of Conduct",         "../../documents/library/code_of_conduct.pdf","",0);
Menu12_6_4       = new Array("Id Card Instructions",    "../../documents/library/id_card_instructions.pdf","",0);
Menu12_6_5       = new Array("Match Report Guidelines", "../../documents/library/match_report_guidelines.doc","",0);
Menu12_7         = new Array("Wet Weather",             "","",1);
Menu12_7_1       = new Array("Wet Weather Info",        "../../documents/library/wet_weather_information.doc","",0,20,118);

Menu13           = new Array("ARCHIVES",     "../../archives.html","",4);
Menu13_1         = new Array("2008",         "../../archives_2008.html","",5,20,42);
Menu13_1_1       = new Array("Events",       "../2008/events.html","",0,20,98);
Menu13_1_2       = new Array("Results",      "../2008/results.html","",0);
Menu13_1_3       = new Array("Match Reports","../2008/reports.html","",0);
Menu13_1_4       = new Array("Galleries",    "../2008/galleries.html","",0);
Menu13_1_5       = new Array("Videos",       "../2008/videos.html","",0);
Menu13_2         = new Array("2009",         "../../archives_2009.html","",5);
Menu13_2_1       = new Array("Events",       "../2009/events.html","",0,20,98);
Menu13_2_2       = new Array("Results",      "../2009/results.html","",0);
Menu13_2_3       = new Array("Match Reports","../2009/reports.html","",0);
Menu13_2_4       = new Array("Galleries",    "../2009/galleries.html","",0);
Menu13_2_5       = new Array("Videos",       "../2009/videos.html","",0);
Menu13_3         = new Array("2010",         "../../archives_2010.html","",5);
Menu13_3_1       = new Array("Events",       "../2010/events.html","",0,20,98);
Menu13_3_2       = new Array("Results",      "../2010/results.html","",0);
Menu13_3_3       = new Array("Match Reports","../2010/reports.html","",0);
Menu13_3_4       = new Array("Galleries",    "../2010/galleries.html","",0);
Menu13_3_5       = new Array("Documents",    "../2010/documents.html","",0);
Menu13_4         = new Array("2011",         "../../archives_2010.html","",4);
Menu13_4_1       = new Array("Events",       "events.html","",0,20,98);
Menu13_4_2       = new Array("Results",      "results.html","",0);
Menu13_4_3       = new Array("Match Reports","reports.html","",0);
Menu13_4_4       = new Array("Galleries",    "galleries.html","",0);

Menu14           = new Array("LINKS",                                                   "../../links.html","",13);
Menu14_1         = new Array("Gladesville Hornsby Football Association",                "http://www.ghfa.com.au/","",0,20,339);
Menu14_2         = new Array("North West Sydney Womens Football",                       "http://www.sportingpulse.com/assoc_page.cgi?assoc=6046&pID=1","",0);
Menu14_3         = new Array("Gladesville Ryde Magic Football Club",                    "http://www.gladesvillerydemagic.com","",0);
Menu14_4         = new Array("Sydney Football Club",                                    "http://www.sydneyfc.com/","",0);
Menu14_5         = new Array("Football NSW",                                            "http://www.footballnsw.com.au/","",0);
Menu14_6         = new Array("Football Federation Australia",                           "http://www.footballaustralia.com.au/","",0);
Menu14_7         = new Array("Hyundai A-League",                                        "http://www.a-league.com.au/","",0);
Menu14_8         = new Array("SBS The World Game",                                      "http://www.theworldgame.com.au/","",0);
Menu14_9         = new Array("BBC Sport - Football",                                    "http://news.bbc.co.uk/sport2/hi/football/default.stm","",0);
Menu14_10        = new Array("FIFA (Fédération Internationale de Football Association)","http://www.fifa.com/index.html","",0);
Menu14_11        = new Array("UEFA (Union of European Football Associations)",          "http://www.uefa.com/","",0);
Menu14_12        = new Array("English Premier League",                                  "http://www.premierleague.com/","",0);
Menu14_13        = new Array("Soccer Kickstart",                                        "http://www.soccerkickstart.com.au/","",0);

Menu15           = new Array("FAQS","../../faqs.html","",0);