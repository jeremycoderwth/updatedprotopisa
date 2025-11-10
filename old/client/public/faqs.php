<?php
session_start();
include('includesClient/header.php');
?>


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAQs</title>
</head>


        <div class="container flex-lg-row-reverse align-items-center g-5">
          <div class="col-10 col-sm-8 col-lg-6"></div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3 text-white header-title">
                Got Questions? We've Got Answers! 
            </h1>
            <p class="lead text-white header-text">
                Welcome to our Frequently Asked Questions (FAQs) page dedicated to helping you make the most of the PISA experience. Here, you'll find answers to common queries about the Programme for International Student Assessment (PISA).
            </p>
          </div>
        </div>
      </div>
    </header>
<!-- End Header -->

<!-- Page Contents -->

    <section>
    <div class="m-5">
        <div class="row">
            <!-- Left side with category list -->
            <div class="col-3 fixed-column trans-delay-1 scroll-slide-hidden">
                <div class="card-faqs">
                    <div class="card-body">
                        <div class="category-list m-3 lh-7">
                            <li class="list-group-item category-item active" data-target="category1">Overview</li>
                            <li class="list-group-item category-item" data-target="category2">Governance</li>
                            <li class="list-group-item category-item" data-target="category3">Process</li>
                            <li class="list-group-item category-item" data-target="category4">Result</li>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 scrollable-column trans-delay-2 scroll-slide-hidden">
                <div id="category1" class="category-content">
                    <!-- Accordion content for Category 1 -->
                    <div class="accordion accordion-flush" id="overviewCategory">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    What is PISA
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                Created by the Organisation for Economic Co-operation and Development (OECD), PISA tests the skills and knowledge of 15-year-old students in reading, mathematics and science. Seventy-nine countries and economies took part in the 2018 assessment, which focused on reading, and the data were released by the OECD on 3rd December 2019.
                                Additional results on financial literacy, school organisation and global competence will be released in 2020.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                What does PISA assess and why?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                PISA focuses on the assessment of student performance in reading, mathematics and science because they are foundational to a student's ongoing education. PISA also collects valuable information on student attitudes and motivations, and formally assesses skills such as collaborative problem solving and global competence. It is also investigating opportunities to assess other important skills related, for example, to creative thinking.
                                <br><br>
                                PISA draws on content that can be found in curricula across the world and looks at students’ ability to apply knowledge and skills and to analyse, reason and communicate effectively as they examine, interpret and solve problems. PISA does not prescribe or promote any one curriculum nor is it constrained by the need to find common denominators. In 2018 the goal of PISA was to assess reading knowledge and skills that experts in the participating countries and economies consider to be most important for students’ full participation in knowledge-based societies that are increasingly reliant on digital technologies. 
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                What are key features of PISA 2018?
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                <strong>Content: </strong>The  PISA  2018  survey  focused  on  reading,  with  mathematics,  science  and  global  competence  as  minor  areas  of assessment. PISA 2018 also included an assessment of young people’s financial literacy, which was optional for countries and economies.
                                <br><br>
                                <strong>Students: </strong>Some 600 000 students completed the assessment in 2018, representing about 32 million 15-year-olds in the schools of the 79 participating countries and economies. 
                                <br><br>
                                <strong>Tests: </strong>Computer-based tests were used in most countries, with assessments lasting a total of two hours. In reading, a multi-stage adaptive approach was applied in computer-based tests whereby students were assigned a block of test items based on their performance in preceding blocks.  Students also answered a background questionnaire, which took about 35 minutes to complete. Test  items  were  a  mixture  of  multiple-choice  questions  and  questions  requiring  students  to  construct  their  own responses. The items were organised into groups based on a passage of text describing a real-life situation. More than 15 hours of test items for reading, mathematics, science and global competence were covered, with different students taking different combinations of test items.
                                <br><br>
                                <strong>Questionnaires: </strong>The questionnaire sought  information  about  the  students  themselves,  their  attitudes,  dispositions  and  beliefs,  their  homes,  and  their school and learning experiences. School principals completed a questionnaire that covered school management and organisation, and the learning environment.  Some  countries/economies  also  distributed  additional  questionnaires  to  elicit  more  information.  These  included:  in 19 countries/economies, a questionnaire for teachers asking about themselves and their teaching practices; and in 17  countries/economies, a questionnaire for parents asking them to provide information about their perceptions of and involvement in their child’s school and learning. Countries/economies could also choose to distribute three other optional questionnaires for students: 52 countries/economies distributed a questionnaire about students’ familiarity with computers; 32 countries/economies distributed a questionnaire about students’ expectations for further education; and 9 countries/economies distributed a questionnaire, developed for PISA 2018, about students’ well-being.
                                <br><br>
                                See further information in a section of What is PISA in Volume I of the PISA 2018 Results [A link to the publication will be available on 3 December 2019].
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                How are PISA results related to adult life outcomes?
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                Four countries – Australia, Canada, Denmark and Switzerland – have conducted longitudinal studies that followed the cohort of students who sat the first PISA assessments in the early 2000s through their transition into adulthood. Across all of these countries, students who performed better in PISA at age 15 were more likely to attain higher levels of education by the age of 25. They were also less likely to be out of the labour market entirely, as measured by the percentage of students who were not in education, employment or training (NEET).
                                <br><br>
                                Of course, there is a link between the socio-economic status of a student’s household – including material living conditions and parents’ educational attainment – and the student’s performance in PISA. However, even after accounting for these factors, students who perform better in PISA at age 15 have stronger education and employment outcomes at the age of 25. In addition, what students say about themselves in the PISA questionnaires also appears related to young people’s future life prospects. For further details, please see the November 2019 PISA in Focus and the report <a href="https://www.oecd-ilibrary.org/education/equity-in-education_9789264073234-en"><i>Equity in Education</i></a>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                What is new in PISA 2018?
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                A new framework for the reading assessment was developed to reflect changes since 2009 – the most recent year in which reading was the main subject of assessment in PISA and the last time that the reading framework was updated – in what and how people read. In particular, over the past decade, reading has increasingly moved onto electronic formats and there has been a proliferation of the amount of material available to read. As a result, the PISA 2018 reading assessment placed greater emphasis on the ability to find, compare, contrast and integrate information across multiple sources of text.
                                <br><br>
                                Adaptive testing was implemented in the reading assessment. Students who performed well on earlier parts of the reading assessment were more likely to receive more difficult questions later in the assessment. Conversely, students who performed poorly in earlier parts of the assessment were more likely to receive easier questions later in the assessment.
                                <br><br>
                                Global competence was tested for the first time in PISA 2018; results for this subject will be published in late 2020.
                                <br><br>
                                Several countries also participated in PISA for the first time: Belarus, Bosnia and Herzegovina, Brunei Darussalam, Morocco, the Philippines, Saudi Arabia and Ukraine. For further details, please see the <a href="https://www.oecd-ilibrary.org/education/how-does-pisa-define-and-measure-reading-literacy_efc4d0fe-en">October 2019 <i>PISA</i> in Focus</a> and the <a href="https://www.oecd-ilibrary.org/education/pisa-2018-assessment-and-analytical-framework_b25efab8-en"><i>PISA 2018 Assessment and Analytical Framework</i></a>.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                Whom does PISA assess?
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                PISA assesses students between the ages of 15 years and 3 months and 16 years and 2 months, and who are enrolled in an educational institution at grade 7 or higher. The lists from which schools and students are selected for the PISA assessment cover all students who meet these criteria, regardless of the type of educational institution in which they are enrolled and whether they are enrolled in full-time or part-time education.
                                <br><br>
                                However, some of the schools and students that are listed may be excluded from PISA samples. PISA standards specify that such exclusions should not represent more than 5% of the target population. Within that limit, students can be excluded for various reasons, including the remoteness and inaccessibility of their school, intellectual or physical disability, a lack of proficiency in the test language (e.g. if the student has received instruction in the test language for less than one year), or a lack of test material in the language of instruction. For countries where the overall level of exclusions exceeds the limit significantly, further information is requested to support the case that no bias in comparisons over time and with other countries would result from exclusions.
                                <br><br>
                                Except in very small countries and economies, not all remaining students sit the PISA assessment; rather, a sample of schools, and of students within schools, is drawn, and the students selected are assigned sampling weights so as to represent the entire PISA-eligible cohort.
                                <br><br>
                                The demographic composition of the PISA sample may change over time, reflecting, for example, changes in enrolment rates or migration flows. These changes can also affect the interpretation of trends. To support the correct interpretation of trends, PISA discusses major contextual changes alongside trends in performance. It presents adjusted trends that account for changes in the student population in addition to the basic, non-adjusted performance trends.
                                <br><br>
                                Further information about the PISA target population for individual countries can be found in Chapter 3 and in Annex A2 of PISA 2018 Results (Volume I) [A link to the publication will be available on 3 December 2019].
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                How many 15-year-olds does the PISA sample represent?
                                </button>
                            </h2>
                            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                The PISA sample represents all students between the age of 15 years and 3 months and 16 years and 2 months, and who are enrolled in an educational institution at grade 7 or higher, minus those that are excluded. PISA reports the proportion of the total 15-year-old population that is represented by the PISA sample (this is known as Coverage Index 3). This proportion ranges from close to 100% in countries with limited exclusions and universal enrolment in educational institutions for 15-16-year-olds, to less than 50% in some low- and middle-income countries. In most participating countries and economies, more than 80% of 15-year-olds are covered.
                                <br><br>
                                Coverage of the 15-year-old cohort has increased in many countries since earlier PISA assessments. For example, between 2003 and 2018, Indonesia added almost 1.8 million students, and Mexico and Turkey more than 400 000 students, to the total population of 15-year-olds eligible to participate in PISA. Uruguay and Brazil also increased the number of 15-year-olds eligible to participate in PISA, despite having a smaller population of 15-year-olds in 2018 than in 2003.
                                <br><br>
                                Further information about the share and number of 15-year-olds covered by PISA can be found in Chapter 3 and in Annex A2 of PISA 2018 Results (Volume I).[A link to the publication will be available on 3 December 2019].                                
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                                Why does PISA test 15-year-olds?
                                </button>
                            </h2>
                            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                The age of 15 was chosen because at this age young people in most OECD countries are nearing the end of compulsory education. The selection of schools and students is as inclusive as possible, so that the sample of students comes from a broad range of backgrounds and abilities.                             
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                                What makes PISA unique?
                                </button>
                            </h2>
                            <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                PISA benefits from its worldwide scope and its regularity. More than <a href="https://www.oecd.org/pisa/aboutpisa/pisa-participants.htm">90 countries and economies</a> have taken part in PISA so far and the surveys, which are carried out every three years, allow participating countries and economies to track their progress in meeting key learning goals. PISA is the only international education survey to measure the knowledge and skills of 15-year-olds.
                                <br><br>
                                PISA is also unique in the way it looks at:
                                <br>
                                <ul>
                                    <li>Public policy issues: Governments, principals, teachers and parents all want answers to questions such as, "Are our schools adequately preparing young people for the challenges of adult life?", "Are some kinds of teaching and schools more effective than others?" and, "Can schools contribute to improving the futures of students from immigrant or disadvantaged backgrounds?"</li>
                                    <li>Literacy: Rather than examine mastery of specific school curricula, PISA looks at students’ ability to apply knowledge and skills in key subject areas and to analyse, reason and communicate effectively as they examine, interpret and solve problems.</li>
                                    <li>Lifelong learning: Students cannot learn everything they need to know in school. In order to be effective lifelong learners, young people need not only knowledge and skills, but also an awareness of why and how they learn. PISA both measures student performance in reading, mathematics and science literacy, and asks students about their motivations, beliefs about themselves and learning strategies.</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                                How do I find out more about the PISA assessment and who develops it?
                                </button>
                            </h2>
                            <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#overviewCategory">
                                <div class="accordion-body">
                                Through its website and publications, the OECD makes available to the public and specialists all the key information on the methods and processes associated with PISA. The following documents are available on the Publications page and the Data page: the assessment frameworks that explain what is to be assessed, why and how; examples of the questionnaire items; the data from the assessment; the survey-implementation tools for administration and language-quality assurance; and a comprehensive technical report for every cycle, which includes detailed technical information on every aspect of assessment and analysis.
                                <br><br>
                                For each assessment cycle a selection of PISA test materials is also made available to the general public. In order to allow countries to follow their performance over time, many questions are used in more than one PISA survey. These questions cannot be made public as long as they are in use.
                                <br><br>
                                In addition to OECD staff and contractors, hundreds of experts, academics and researchers in PISA-participating countries and economies are involved in PISA's development, analysis and reporting; details of these participants are provided in the PISA reports.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="category2" class="category-content">
                    <!-- Accordion content for Category 2 -->
                    <div class="accordion accordion-flush" id="governanceCategory">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc2-flush-heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc2-flush-collapse1" aria-expanded="false" aria-controls="acc2-flush-collapse1">
                                How is PISA governed?
                                </button>
                            </h2>
                            <div id="acc2-flush-collapse1" class="accordion-collapse collapse" aria-labelledby="acc2-flush-heading1" data-bs-parent="#governanceCategory">
                                <div class="accordion-body">
                                PISA is developed and implemented under the responsibility of education ministries through PISA’s decision-making body, the PISA Governing Board. The Board has representatives from all member countries plus partner countries with Associate status, currently Brazil and Thailand. Countries appoint representatives to the Board who are knowledgeable about large-scale student assessments and their interface with educational policy and practice. Representatives comprise a mix of government officials and staff of research and academic institutions.
                                <br><br>
                                The Board determines the policy priorities for PISA and oversees adherence to these priorities during implementation. This includes setting priorities and standards for data development, analysis and reporting, and determining the scope of work that will then form the basis for the implementation of PISA.
                                <br><br>
                                To ensure the technical robustness of PISA, a Technical Advisory Group (TAG) is appointed by the OECD comprising independent, world-renowned experts in the fields that underpin the PISA methodology, such as sampling, survey design, scaling and analysis. The TAG is regularly called upon to adjudicate the PISA methods and the results of individual countries to ensure that what is published from PISA is robust and internationally comparable.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc2-flush-heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc2-flush-collapse2" aria-expanded="false" aria-controls="acc2-flush-collapse2">
                                Which institutions and teams are behind PISA?
                                </button>
                            </h2>
                            <div id="acc2-flush-collapse2" class="accordion-collapse collapse" aria-labelledby="acc2-flush-heading2" data-bs-parent="#governanceCategory">
                                <div class="accordion-body">
                                The PISA Governing Board: The PISA Governing Board is composed of representatives of OECD members and PISA associates.* Countries and economies that participate in PISA but do not have associate status are welcome to participate in PGB meetings as observers. Representatives are appointed by their education ministries, and the PGB Chair is chosen by the Board itself. Guided by the OECD’s education objectives, the Board determines the policy priorities for PISA and makes sure that these are respected during the implementation of each PISA survey.
                                <br><br>
                                *Associates are countries or economies that are not OECD members but have membership rights and obligations with regard to specific OECD bodies and programmes.
                                <br><br>
                                The OECD Secretariat: The OECD Secretariat is responsible for the day-to-day management of PISA. This means that the PISA team monitors the survey’s implementation, manages administrative matters for the PISA Governing Board, builds consensus among countries and serves as an intermediary between the PISA Governing Board and the PISA Consortium.
                                <br><br>
                                PISA National Project Managers: Working with the OECD Secretariat, the PISA Governing Board and the international contractors, the PISA National Project Managers oversee the implementation of PISA in each participating country/economy. The PISA National Project Managers are appointed by their governments. A list of the 2015 National Project Managers is provided here.
                                <br><br>
                                International contractors (the "PISA Consortium"): For each PISA survey, international contractors (usually made up of testing and assessment agencies) are responsible for the design and implementation of the surveys. The contractors are chosen by the PISA Governing Board through an international call for tender. The contractors are typically referred to as the PISA Consortium.
                                <br><br>
                                Education authorities: PISA would not be possible without the support and guidance of the education ministries in the participating countries and economies.
                                <br><br>
                                PISA Subject Matter Expert Groups: PISA has Subject Matter Expert Groups for its three key areas of testing – reading, mathematics and science – as well as for other subjects when appropriate (global competence in PISA 2018, for example). These groups are made up of world experts in each area. They design the theoretical framework for each PISA survey.
                                <br><br>
                                PISA Questionnaire Expert Group: The Questionnaire Expert Group provides leadership and guidance in the construction of the PISA context questionnaires. The members of the Questionnaire Expert Group are selected by the PISA Governing Board.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc2-flush-heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc2-flush-collapse3" aria-expanded="false" aria-controls="acc2-flush-collapse3">
                                Who pays for PISA?
                                </button>
                            </h2>
                            <div id="acc2-flush-collapse3" class="accordion-collapse collapse" aria-labelledby="acc2-flush-heading3" data-bs-parent="#governanceCategory">
                                <div class="accordion-body">
                                PISA is financed exclusively through direct contributions from the participating countries and economies’ government authorities, typically education ministries.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc2-flush-heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc2-flush-collapse4" aria-expanded="false" aria-controls="acc2-flush-collapse4">
                                How much does PISA cost?
                                </button>
                            </h2>
                            <div id="acc2-flush-collapse4" class="accordion-collapse collapse" aria-labelledby="acc2-flush-heading4" data-bs-parent="#governanceCategory">
                                <div class="accordion-body">
                                Although PISA is a triennial international survey, it is easiest to consider the costs for participating countries on an annual basis. The costs comprise international costs (participating countries contribute to the cost of the International Contractors and OECD staff and related expenses) and national costs associated with the implementation of the PISA survey in the respective country (establishment of a national centre, cost of sampling, translation etc.) 
                                <br><br>
                                <strong>Participation</strong>
                                <ul>
                                    <li>Participation in PISA is open to all <strong>OECD Members</strong>.</li>
                                    <li>Invitations to – and participation of – <strong>partner countries/economies in PISA with Associate status</strong> in the PISA Governing Board (“PGB”) are approved by the Council following a recommendation of the PGB.</li>
                                    <li><strong>Other partner countries/economies</strong> may participate in the PISA survey and may be invited by the PGB as Participants in the PGB.</li>
                                </ul>
                                <strong>Cost of participation</strong>
                                <br>
                                <strong>a. International costs</strong>
                                <br>
                                <u>Members and Associates:</u> The cost for participation is determined by the Secretariat of PISA.  The cost is composed of a floor contribution, determined by the PISA Governing Board (PGB); the remainder of costs are assigned to Members and Associates on the basis of the OECD principles and rules for determining the scales of contributions by Members, using as input statistics, national income data and exchange rates used in the calculation of scales for the previous year.  As a result, the cost of participation varies between countries.
                                <br>
                                <u>Partners:</u> International PISA costs for partner countries/economies are determined by the PISA Secretariat at the beginning of each PISA cycle, following signature of the contracts with international contractors.  The costs are generally spread over a four-year period with an average cost of approximately EUR 50 000 per year (estimate based on costs for participation in PISA 2021).
                                <br><br>
                                <strong>b. National costs</strong>
                                <br>
                                National costs for the implementation of PISA vary by country, according to factors such as sample size, the number of languages to be tested in the assessment, national income statistics and living standards. For example, a small country might spend approximately EUR 75 000 per annum while a medium-sized country EUR 300 000 per annum; a large country could spend up to two or three times the latter amount.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="category3" class="category-content">
                    <!-- Accordion content for Category 3 -->
                    <div class="accordion accordion-flush" id="resultCategory">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc3-flush-heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3-flush-collapse1" aria-expanded="false" aria-controls="acc3-flush-collapse1">
                                What types of test items are used in PISA and why?
                                </button>
                            </h2>
                            <div id="acc3-flush-collapse1" class="accordion-collapse collapse" aria-labelledby="acc3-flush-heading1" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                PISA uses multiple-choice testing as the primary feature of its assessments because it is reliable, efficient, and supports robust and scientific analyses. Multiple-choice questions in PISA have a variety of formats, including highlighting of a word within a text, connecting pieces of information and making multiple selections from drop-down menus. In addition, typically up to one-third of questions in a PISA assessment are open-ended.
                                <br><br>
                                Students also answer a background questionnaire, providing information about themselves, their attitudes to learning and their homes. In addition, school principals are given a questionnaire about their schools. Countries and economies can also choose to distribute several optional PISA questionnaires: the computer familiarity questionnaire, the educational career questionnaire, the well-being questionnaire, the parent questionnaire and the teacher questionnaire. PISA 2018 questionnaires are available here. In addition, many countries and economies choose to gather further information through national questionnaires. The information collected helps countries and economies explore connections between how students perform in PISA and factors such as immigrant background, gender and students’ socio-economic status, as well as students’ attitudes towards school and learning.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc3-flush-heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3-flush-collapse2" aria-expanded="false" aria-controls="acc3-flush-collapse2">
                                Who creates the test questions?
                                </button>
                            </h2>
                            <div id="acc3-flush-collapse2" class="accordion-collapse collapse" aria-labelledby="acc3-flush-heading2" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                Participating PISA countries and economies are invited to submit questions that are then added to items developed by the OECD’s experts and contractors. The questions are reviewed by the international contractors and by participating countries and economies, and are carefully checked for cultural bias. Only those questions that pass these checks are used in PISA. Further, before the main test is conducted there is a trial test run in all participating countries and economies. If any test questions prove to be too easy or too difficult in certain countries and economies, for reasons not related to the overall level of proficiency of students (as demonstrated on the remaining questions), they are dropped from the main test in all countries and economies.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc3-flush-heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3-flush-collapse3" aria-expanded="false" aria-controls="acc3-flush-collapse3">
                                Why don’t all students answer all the same test questions?
                                </button>
                            </h2>
                            <div id="acc3-flush-collapse3" class="accordion-collapse collapse" aria-labelledby="acc3-flush-heading3" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                The PISA test is designed to provide an assessment of performance at the system (or country) level. It is not designed to produce scores for individual students, so it is not necessary for each student to receive exactly the same set of test items. Thus, PISA adopts an efficient design in which the full set of test material, covering all aspects of the framework, is distributed over a large number of test forms. This procedure enables the OECD to obtain a much greater coverage of the content than if all students had completed the same version of the test.
                                <br><br>
                                In mathematics and science, the assignment of students to test forms was entirely random. In reading, which was assessed through adaptive testing, the initial assignment was random, but the precise form was only determined during the assessment, taking into account students’ performance in the early portions of the assessment. As a result of this multi-stage adaptive design, high-performing students were more likely to be directed to more difficult questions (and low-achieving students to easier questions). This provided greater accuracy in measurement of both test scores and the relationship between test scores and other factors, such as socio-economic status.
                                <br><br>
                                In PISA 2018, all students took an hour-long sequence of reading questions. The test material for each of the mathematics and science assessments, which were not presented via adaptive testing, was divided into six testlets and combined into forms composed of two testlets; most students sat either two mathematics or two science testlets, in addition to the reading test.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc3-flush-heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3-flush-collapse4" aria-expanded="false" aria-controls="acc3-flush-collapse4">
                                PISA 2015 and 2018 were delivered as computer-based tests, while in 2012 and earlier, PISA was delivered on paper. What is the significance of this?
                                </button>
                            </h2>
                            <div id="acc3-flush-collapse4" class="accordion-collapse collapse" aria-labelledby="acc3-flush-heading4" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                Computers and computer technology are part of our everyday lives and it is appropriate and inevitable that PISA has progressed to a computer-based delivery mode. Over the past decades, digital technologies have fundamentally transformed the ways we read and manage information. Digital technologies are also transforming teaching and learning, and how schools assess students. To reflect how students and societies now commonly access, use and communicate information, starting with the 2015 assessment cycle, the PISA test was delivered mainly on computer. Existing tasks were adapted for delivery on screen; new tasks (initially only in science, then, for PISA 2018, also in reading) were developed that made use of the affordances of computer-based testing and that reflected the new situations in which students apply their science or reading skills in real life. For the comparability of computer and paper-based tests, see a FAQ under “Results”.  
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc3-flush-heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3-flush-collapse5" aria-expanded="false" aria-controls="acc3-flush-collapse5">
                                How are schools selected in countries for participation in PISA?
                                </button>
                            </h2>
                            <div id="acc3-flush-collapse5" class="accordion-collapse collapse" aria-labelledby="acc3-flush-heading5" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                PISA applies strict technical standards including for the sampling of schools and students within schools. The sampling procedures are quality assured and the achieved samples and corresponding response rates are subject to an adjudication process that verifies that they have complied with the standards set. If any country's response rate falls below the specified threshold, it is reported. Further information about response rates in PISA can be found on the OECD's PISA website, and specific information on participation rates for individual countries can be found in Annex A2 of Volume I of the PISA 2018 Results. Regarding weighting adjustments in order to mitigate the impact of school non-response and student non-response on their under-representation in the data, see Chapter 8 of the PISA 2018 Technical Report. 
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc3-flush-heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3-flush-collapse6" aria-expanded="false" aria-controls="acc3-flush-collapse6">
                                How does the OECD treat data anomalies?
                                </button>
                            </h2>
                            <div id="acc3-flush-collapse6" class="accordion-collapse collapse" aria-labelledby="acc3-flush-heading6" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                The following lists cases in which the OECD, on the basis of technical advice from the PISA Consortium, removed or annotated national data in the report because of technical anomalies or because the data did not meet the OECD technical standards for PISA. Such cases are listed below for earlier assessments. For PISA 2018, see Annex A4 of Volume I of the PISA 2018 Results. 
                                <br><br>
                                <ul>
                                    <li><strong>Albania:</strong> In PISA 2012, Albania submitted parental occupation data that was incomplete and appeared inaccurate, since there was over-use of a narrow range of occupations. It was not possible to resolve these issues during the course of data cleaning, and as a result neither parental occupation data nor any indices that depended on this data were included in the international dataset. Results for Albania were omitted from any analyses that depended on these indices. In PISA 2015, the assessment was conducted in accordance with the operational standards and guidelines of the OECD. However, because of the ways in which the data were captured, it was not possible to match the data in the test with the data from the student questionnaire. As a result, Albania could not be included in analyses that related students’ responses from the questionnaires to the test results.</li>
                                    <li><strong>Argentina:</strong> In PISA 2015, the PISA assessment was conducted in accordance with the operational standards and guidelines of the OECD. However, there was a significant decline in the proportion of 15-year-olds who were covered by the test, both in absolute and relative numbers. There had been a re-structuring of Argentina’s secondary schools, except for those in the adjudicated region of Ciudad Autónoma de Buenos Aires, which was likely to have affected the coverage of eligible schools listed in the sampling frame. As a result, Argentina’s results might not have been comparable to those of other countries or to results for Argentina from previous years.</li>
                                    <li><strong>Kazakhstan:</strong> In PISA 2015, the national coders were found to be lenient in marking. Consequently, the human-coded items did not meet PISA standards and were excluded from the international data. Since human-coded items form an important part of the constructs that are tested by PISA, the exclusion of these items resulted in a significantly smaller coverage of the PISA test. As a result, Kazakhstan’s results might not have been comparable to those of other countries or to results for Kazakhstan from previous years.</li>
                                    <li><strong>Malaysia:</strong> In PISA 2015, theassessment was conducted in accordance with the operational standards and guidelines of the OECD. However, the weighted response rate among the initially sampled Malaysian schools (51%) fell well short of the standard PISA response rate of 85%. Therefore, the results might not have been comparable to those of other countries or to results for Malaysia from previous years. </li>
                                    <li><strong>Austria:</strong> As noted in the <a href="https://www.oecd-ilibrary.org/education/programme-for-international-student-assessment-pisa_9789264199521-en"><strong>PISA 2000 Technical Report (OECD, 2003)</strong></a>, the Austrian sample for the PISA 2000 assessment did not adequately cover students enrolled in combined school and work-based vocational programmes as required by the technical standards for PISA. The published PISA 2000 estimates for Austria were therefore biased (OECD, 2001). This non-conformity was corrected in the PISA 2003 assessment. To allow reliable comparisons, adjustments and modified student weights were developed which make the PISA 2000 estimates comparable to those obtained in PISA 2003 (OECD Working Paper No. 5 “PISA 2000: Sample Weight Problems in Austria”).
                                    <br><br>
                                    For the PISA 2009 assessment, a dispute between teachers’ unions and the education minister in Austria led to the announcement of a boycott of PISA which was withdrawn after the first week of testing. The boycott required the OECD to remove identifiable cases from the dataset. Although the Austrian dataset met the PISA 2009 technical standards after the removal of these cases, the negative atmosphere in relation to education assessments affected the conditions under which the assessment was conducted and could have adversely affected student motivation to respond to the PISA tasks. The comparability of the 2009 data with data from earlier PISA assessments could therefore not be ensured, and data for Austria were therefore excluded from trend comparisons.</li>
                                    <li><strong>Luxembourg:</strong> For Luxembourg changes were implemented in the assessment conditions between PISA 2000 and PISA 2003 with regard to organisational and linguistic aspects in order to improve compliance with OECD standards and to better reflect the national characteristics of the school system. In PISA 2000, students in Luxembourg had been given one assessment booklet, with the languages of testing chosen by each student one week prior to the assessment. In practice, however, familiarity with the language of assessment became a significant barrier for a large proportion of students in Luxembourg in PISA 2000. In PISA 2003 and PISA 2006, therefore, students were each given two assessment booklets – one in each of the two languages of instruction – and could choose their preferred language immediately prior to the assessment. This provided for assessment conditions that were more comparable with those in countries that have only one language of instruction and resulted in a fairer assessment of the performance of students in mathematics, science, reading and problem solving. As a result of this change in procedures, the assessment conditions and hence the assessment results for Luxembourg could not be compared between PISA 2000 and PISA 2003. Assessment conditions between PISA 2003 and PISA 2006 had not changed and therefore results could be compared.</li>
                                    <li><strong>The Netherlands:</strong> As noted in the PISA 2000 Technical Report (OECD, 2003), the response rate of schools for the Netherlands for PISA 2000 was insufficient to warrant inclusion in the PISA 2000 database. Therefore, the Netherlands was excluded from trend analysis relating to PISA 2000.</li>
                                    <li><strong>Spain:</strong> Available in English and Spanish.</li>
                                    <li><strong>United Kingdom:</strong> In PISA 2000, the initial response rate for the United Kingdom fell 3.7% short of the minimum requirement. At that time, the United Kingdom provided evidence to the PISA Consortium that permitted an assessment of the expected performance of the non-participating schools. On the basis of that information, the PISA Consortium concluded that the response bias was likely negligible and the results were therefore included in the international report. In PISA 2003, the United Kingdom’s response rate was such that required sampling standards were not met and further investigation by the PISA Consortium did not confirm that the resulting response bias was negligible. Therefore, these data were not deemed internationally comparable and were not included in most types of comparisons. For PISA 2006, the more stringent standards were applied, and PISA 2000 and PISA 2003 data for the United Kingdom were therefore not included in the comparisons.</li>
                                    <li><strong>United States:</strong> In PISA 2006, an error in printing the test booklets in the United States, whereby the pagination was changed and instructions for some reading items directed students to the wrong page, may have affected student performance. The potential impact of the printing error on student performance was estimated by examining the relative performance of students in the United States on the item set that was common between PISA 2006 and PISA 2003, after controlling for performance on the items that were not likely to be affected by the printing error.
                                    <br><br>
                                    The predicted effect of the printing error and the wrong directions on students’ mean performance on the reading test was up to 6 score points, and thus exceeded one standard error of sampling. Reading performance data for the United States were therefore excluded from the publication and the PISA database.
                                    <br><br>
                                    The predicted effect of the printing error on student mean performance on the mathematics and science tests was one score point. Mathematics and science performance data for the United States, therefore, were retained.</li>
                                </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="category4" class="category-content">
                    <!-- Accordion content for Category 4 -->
                    <div class="accordion accordion-flush" id="resultCategory">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse1" aria-expanded="false" aria-controls="acc4-flush-collapse1">
                                Are the results and data from the PISA surveys publicly available?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse1" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading1" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                Three first volumes of the PISA 2018 Results are available on line (Volumes I, II and III) [A link to the publications will be available on 3 December 2019]. Volume IV on financial literacy, Volume V on school organisation and Volume VI on global competence will be available in 2020. Results from previous cycles are available on the Key Findings page. All data from the PISA surveys can be found on the Data page.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse2" aria-expanded="false" aria-controls="acc4-flush-collapse2">
                                What do the test scores mean?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse2" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading2" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                PISA scores can be located along specific scales developed for each subject area, designed to show the general competencies tested by PISA. These scales are divided into levels that represent groups of PISA test questions, beginning at Level 1 with questions that require only the most basic skills to complete and increasing in difficulty with each level. (More specifically, the mathematics scale starts at Level 1; the lowest level of the science scale is Level 1b, and is followed by Level 1a; and the lowest level of the reading scale is Level 1c, followed by Levels 1b and 1a.)
                                <br><br>
                                Once a student’s responses to the test have been scored, his or her overall score in reading, mathematics and science (plus global competence in PISA 2018) can be located on the appropriate scale. For example, a student who lacks the skills needed to correctly complete the easiest questions on a PISA test would be classified as below Level 1 (or Level 1b or 1c, as per the domain), while a student whose answers show mastery of these skills would be classified at a higher level.
                                <br><br>
                                In each test subject, there is theoretically no minimum or maximum score in PISA; rather, the results are scaled to fit approximately normal distributions, with means for OECD countries around 500 score points and standard deviations around 100 score points. About two-thirds of students across OECD countries score between 400 and 600 points. Less than 2% of students, on average across OECD countries, reach scores above 700 points, and at most a handful of students in the PISA sample for any country reach scores above 800 points.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse3" aria-expanded="false" aria-controls="acc4-flush-collapse3">
                                How are participating countries and economies ranked in PISA?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse3" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading3" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                PISA ranks participating countries and economies according to their performance in reading, mathematics and science. PISA does not give a collective score for all subjects combined; rather it gives a score for each subject area, and the mean score in each subject can be used to rank countries. However, even within a single subject, it is not possible to assign an exact rank to each country or economy based on its mean score. This is because PISA tests only a sample of students from each country or economy, and estimates, based on their results, the distribution of performance in the whole population of 15-year-old students. The statistical uncertainty associated with these estimates means that it is only possible to report the range of positions (upper rank and lower rank) within which a country or economy can be placed. For example, in PISA 2003 Finland and Korea were widely reported as ranking 1st and 2nd in PISA, when in fact we can only say that, among OECD countries, Finland’s rank was between 1st and 3rd and Korea’s was between 1st and 4th.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse4" aria-expanded="false" aria-controls="acc4-flush-collapse4">
                                How comparable are the PISA 2018 computer- and paper-based tests?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse4" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading4" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                The overwhelming majority of countries that participated in PISA 2018 had students complete the test on computer. A small number of countries that were not ready for computer-based delivery conducted the tests on paper. Student performance is comparable between the computer-based tests and the pen-and-paper tests used in PISA 2018, and also between computer-based tests used PISA 2015 and 2018 and previous paper-based cycles. However, some caution is advised when comparing reading and science scores across the two modes of delivery. The computer-based tests used in PISA 2018 expanded the range of science and reading skills that are assessed beyond those covered by the paper-based test, to include, for example, reading in digital formats or the ability to carry out experiments and conduct scientific enquiry. More information on the comparability of computer- and paper-based tests can be found in Annex A5 of Volume I of the PISA 2018 Results  and in Annex A5 of Volume I of the PISA 2015 Results.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse5" aria-expanded="false" aria-controls="acc4-flush-collapse5">
                                How does PISA measure change in performance over time?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse5" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading5" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                PISA scores are reported on the same scale over time. The scale was set in the first year in which each subject was the major focus of the assessment (2000 for reading, 2003 for mathematics and 2006 for science).
                                <br><br>
                                To determine whether performance improved, remained stable, or declined, PISA uses both year-to-year comparisons (e.g. between 2015 and 2018, or between 2009 and2018) and average trends over three or more assessment years (i.e. over a period of 6 years or longer).
                                <br><br>
                                Year-to-year comparisons are most robust when comparing assessments that share a large number of items and other design features, For example, comparisons between 2015 and 2018 for all subjects, or (to a lesser extent) between 2018 and the previous year in which the domain of interest was a major domain (2009 for reading and 2012 for mathematics). In some cases, however, year-to-year comparisons can be confounded by particular circumstances affecting the test administration in one of the two years only.
                                <br><br>
                                Average trends that combine data from three or more measurements can reduce the uncertainty involved in trend comparisons and limit the possible confounding effect of unique circumstances that may have affected the test administration in a single year. In PISA reports, average trends are the preferred measure of change in mean performance over time spans of nine years or more. Average trends also allow for meaningful comparisons of trends between countries that cannot compare data across all assessment years, although differences in participation must be considered when interpreting these comparisons. For more information about measuring trends and the sources of uncertainty in these measurements, see [Annex A7] in the PISA 2018 Report (Volume I).
                                <br><br>
                                Real change, in education, is cumulative and often slow; with good measurement, one should expect gradual improvement or decline. In this situation, year-to-year comparisons may not be significant, taken individually, but the accumulation of short-term changes that point in the same direction represents a significant trend. Fitting a regression line to multiple measurements allows for the extraction of a signal from data that are, at times, noisy, and to detect if there is an underlying pattern of improvement or deterioration.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse6" aria-expanded="false" aria-controls="acc4-flush-collapse6">
                                What steps are taken to ensure the PISA tests and the results from it are robust?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse6" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading6" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                Confidence in the robustness of PISA is based on the rigour that is applied to all technical aspects of the survey design, implementation and analysis, not just on the nature of the statistical model, which has developed over time and will continue to do so. Specifically regarding test development, the robustness of the assessment lies in the rigour of the procedures used in item development, field trials, analysis, review and selection.
                                <br><br>
                                The task for the experts developing the assessment is to ensure that all these aspects are taken into account, and to use their expert judgement to select a set of test items such that there is a sufficient balance across all these aspects. In PISA this is done by assessment specialists who work with advisory groups made up of international experts. Participating countries and economies also play a key role in this item-selection process.
                                <br><br>
                                The details of the test design and development processes are available in the PISA 2018 Technical Report. Technical reports for earlier assessments are also available on the PISA website. For example, the PISA 2015 Technical report.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse7" aria-expanded="false" aria-controls="acc4-flush-collapse7">
                                How does PISA ensure the comparability of questions across countries and languages?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse7" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading7" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                The value of cross-country comparisons is at the heart of large-scale international surveys such as PISA. PISA follows several standards and procedures concerned with ensuring fair and valid comparisons of PISA results across countries. These include the consistent implementation of PISA and the use of representative samples in each participating country and economy. Much effort also goes into ensuring that the questions used in PISA maintain their measurement properties in each of the many language versions (in PISA 2018, about 100 different language versions were used). The steps to ensure that the resulting measures are equivalent include:
                                <br><br>
                                <ul>
                                    <li>Qualitative reviews of all test and questionnaire items, at different stages of their development, by national and international experts in the respective domains. The ratings and comments submitted by national experts determine the revision of items and coding guides for the main study, and guide the final selection of questions.</li>
                                    <li>Prescribed procedures for translation and adaptation. These include the preparation of two source versions (English and French), of detailed translation and adaptation guidelines, the requirement of a double-translation design (two independent translations are reconciled by a third person), and a final quality control of the resulting translation (“verification”), performed by the international PISA consortium. Countries sharing a test language are encouraged to develop a common version that is then adapted to national contexts. Translation and adaptation procedures are described in Chapter 4 of the PISA 2018 Technical Report.</li>
                                    <li>For test and questionnaire scales relying on multiple questions, systematic analysis of measurement equivalence through statistical indicators of scale consistency and model fit. These analyses are documented in Chapters 12 and 16 of the PISA 2018 Technical Report, in Annex A6 of PISA 2018 Results (Volume I), and in Annex A5 of PISA 2018 Results (Volume III). The comparability of scale values is supported by a large number of items whose model parameters could be constrained to the same values and that can therefore serve as “anchors” on the reporting scale.</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse8" aria-expanded="false" aria-controls="acc4-flush-collapse8">
                                Can students cheat on PISA?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse8" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading8" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                PISA is the world's foremost international, high-quality and high-impact education assessment programme, so it is vitally important that the PISA data are accurate and authentic. Therefore the OECD applies strict conditions at all levels to make sure student data accurately reflect students’ ability and performance, and do not involve any form of cheating. This assurance starts with the Agreement for Participation between the OECD and each country. Article 4 of the agreement requires countries to comply with the comprehensive Technical Standards for PISA, including the secure management of test materials and secure administration of the assessment. These requirements are then reinforced through the PISA Operations Manual, the School Co-ordinators Manual and the Test Administrators Manual. These manuals have explicit instructions for the secure receipt, handling and storage of all test-related materials, and for the secure administration of the test itself. No one other than approved project staff has access to secure PISA data, and embargoed material and formal confidentiality arrangements are in place for all approved project staff.
                                <br><br>
                                Adherence to the standards is monitored throughout all project-implementation phases, and all deviations (e.g. deviations from the agreed test-administration protocol), both minor and major, are recorded for further review. After students sit the assessment, each national dataset is reviewed and any inconsistencies flagged for further analysis. Such inconsistencies include, for example, differences between one country and others in how items functioned, and differences in a country between the field trial and the main study in how items functioned. Data adjudication is the quality-control process through which each national dataset and quality-monitoring report are reviewed, and through which a judgement about the appropriateness of the data for the main reporting goals is formed.
                                <br><br>
                                Data for adjudicated regions are also reviewed, although not all sub-national jurisdictions choose to undergo the data-adjudication process.
                                <br><br>
                                The process and outcomes of data adjudication for PISA 2018 are described in Chapter 14 of the PISA 2018 Technical Report [forthcoming].
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading9">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse9" aria-expanded="false" aria-controls="acc4-flush-collapse9">
                                Why doesn’t the whole of the People’s Republic of China participate in PISA?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse9" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading9" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                Over recent cycles, the national ministry has been piloting PISA in several provinces/municipalities in preparation for fuller participation across China. Shanghai has participated since PISA 2009. In PISA 2015, the municipalities of Beijing and Shanghai and the provinces of Jiangsu and Guangdong participated. In PISA 2018, the municipalities of Beijing and Shanghai and the provinces of Jiangsu and Zhejiang participated.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading10">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse10" aria-expanded="false" aria-controls="acc4-flush-collapse10">
                                How have the lessons from PISA helped countries and economies improve their education systems?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse10" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading10" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                In a 2012 OECD survey of PISA-participating countries and economies, the large majority of respondents reported that the policies of high-performing countries or improving systems had been influential in their own policy-making processes. The same number of countries and economies also indicated that PISA had influenced the development of new elements of a national or federal assessment strategy. In relation to curriculum setting and standards, many countries and economies cited the influence of the PISA frameworks on: comparisons of national curricula with PISA frameworks and assessments; formation of common standards nationally; impact on their reading frameworks; the incorporation of PISA-like competencies in their curricula; and for setting national proficiency standards.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading11">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse11" aria-expanded="false" aria-controls="acc4-flush-collapse11">
                                How do PISA results support education system improvement?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse11" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading11" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                The OECD strives to identify what policies and practices appear to be “working” in countries and economies that are recording high performance or show evidence of significant improvement over time on PISA. It then reports those findings and supports countries and economies that wish to investigate and explore the extent to which they would benefit from similar programmes. The OECD is aware of the different circumstances in different countries and economies (with nearly 80 participating in PISA 2018). There is no ‘one size fits all” education model for countries and economies. It is not possible or appropriate to “cut and paste” one country's education system into another country or economy.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="acc4-flush-heading12">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc4-flush-collapse12" aria-expanded="false" aria-controls="acc4-flush-collapse12">
                                Did the PISA 2015 assessment accurately measure students’ ability to collaborate with other humans?
                                </button>
                            </h2>
                            <div id="acc4-flush-collapse12" class="accordion-collapse collapse" aria-labelledby="acc4-flush-heading12" data-bs-parent="#resultCategory">
                                <div class="accordion-body">
                                In the PISA 2015 collaborative problem-solving assessment, the student test-taker interacted with computer agents instead of other human agents.  This allowed for the consistent measurement of students’ abilities, as any pre-existing interpersonal relationships between classmates had no impact on students’ performance. A validation study concluded that students’ results in the human-computer assessment were informative of how they would perform in interactions with other humans. In particular, the performance of different groups of students could be reliably compared.
                                <br><br>
                                There were three components to the study. First, four PISA collaborative problem-solving units were re-formatted by replacing one of the computer agents with another human student who, like the primary test-taker, also saw a multiple-choice selection of possible responses. Students worked in separate locations. The second involved teachers who had observed their students over the school year and thus were expected to make accurate assessments of their students’ ability to work collaboratively. The third component featured students who worked face-to-face on other re-formatted units and could freely formulate their responses.
                                <br><br>
                                The results of the first component showed only small differences in absolute performance scores between students who interacted with a computer agent and those who interacted with a human agent. These were not significant from a practical standpoint because of their size and because students’ scores in the human-human and human-computer assessments were highly correlated. The results of the second component showed that students’ performance scores in both the original and re-formatted collaborative problem-solving units correlated with their teachers’ opinions of their performance. The results of the third component showed that students’ performance in the original and re-formatted units, both of which took place in a virtual, computer-based setting, was a moderately good predictor of their performance in the face-to-face setting. See Box V.2.1 of the PISA 2015 Initial Report (Volume V) for further information.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript for handling category clicks -->
    <script>

        // FOR ACCORDION
        $(document).ready(function() {
            // Hide all category contents initially
            $(".category-content").hide();
            $("#category1").show();

            // Show the selected category content when a category item is clicked
            $(".category-item").click(function() {
                $(".category-content").hide();
                $("#" + $(this).data("target")).show();

                // Remove the 'active' class from all category items
                $(".category-item").removeClass("active");

                // Add the 'active' class to the clicked category item
                $(this).addClass("active");
            });
        });


    </script>
<!-- EndPage Contents -->

 <!-- Footer -->
<section class="gradient-background">
      <footer class="container py-5 text-white">
        <div class="row">
          <div class="col-sm-6 col-md-6 mb-3">
            <form>
              <img class="logo-footer" src="../assets/images/Logo.png" alt="PISA">
              <p class="py-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
              </p>
            </form>
          </div>

          <div class="col-sm-3 col-md-3 mb-3">
            <h5>Quick links</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Contact</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
            </ul>
          </div>
          
          <div class="col-sm-3 col-md-2 mb-3">
            <h5>Contact info</h5>
            <ul class="nav flex-column">
            <li class="nav-item mb-2 "><a href="#" class="nav-link p-0 text-white">Address</a>
            <p>123 Fifth Avenue, New York, NY 10160</p>
            </li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Phone</a>
            <p>929-242-6868</p></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Email</a>
            <p>contact@info.com</p></li>
          </ul>
        </div>

   
      </div>
      
  <div class="row">
    <div class="col">
      <img class="mx-2 my-2" src="../assets/images/facebook.svg" alt="facebook">
      <img class="mx-2 my-2" src="../assets/images/twitter.svg" alt="twitter">
      <img class="mx-2 my-2" src="../assets/images/instagram.svg" alt="instagram">
      <img class="mx-2 my-2" src="../assets/images/youtube.svg" alt="youtube">
      <img class="mx-2 my-2" src="../assets/images/linkedin.svg" alt="linkedin">
      <img class="mx-2 my-2" src="../assets/images/share-fill.svg" alt="share">
    </div>
    <div class="col text-end">
      Copyright &copy; 2023
      <p><i>This is only a prototype intended for educational and dissertation use.</i></p>
    </div>
  </div>
    </footer>
  </section>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
      ></script>
  </body>
  </html>