-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2014 at 12:01 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `policy_hack`
--

-- --------------------------------------------------------

--
-- Table structure for table `eligibility`
--

CREATE TABLE IF NOT EXISTS `eligibility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `gender` int(2) NOT NULL,
  `age` int(2) NOT NULL,
  `marital_status` int(2) NOT NULL,
  `area` int(2) NOT NULL,
  `poverty_level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `eligibility`
--

INSERT INTO `eligibility` (`id`, `parent_id`, `gender`, `age`, `marital_status`, `area`, `poverty_level`) VALUES
(1, 2, 2, 3, 3, 0, 2),
(2, 3, 2, 3, 3, 0, 1),
(3, 4, 1, 1, 0, 0, 1),
(4, 5, 2, 2, 3, 0, 1),
(5, 6, 1, 0, 1, 0, 1),
(6, 7, 2, 3, 3, 2, 2),
(7, 8, 2, 3, 3, 2, 2),
(8, 9, 1, 1, 0, 0, 1),
(9, 10, 2, 3, 3, 0, 2),
(10, 11, 1, 3, 3, 2, 2),
(11, 12, 1, 0, 1, 0, 1),
(12, 13, 2, 3, 3, 2, 1),
(13, 14, 0, 1, 3, 2, 1),
(14, 15, 3, 2, 3, 2, 2),
(15, 16, 2, 3, 3, 0, 1),
(16, 17, 2, 2, 3, 2, 1),
(17, 18, 2, 2, 3, 2, 2),
(18, 19, 2, 2, 3, 2, 1),
(19, 20, 1, 1, 0, 2, 1),
(20, 21, 1, 1, 3, 2, 1),
(21, 22, 2, 3, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grievances`
--

CREATE TABLE IF NOT EXISTS `grievances` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `upvotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `submission_id` int(11) NOT NULL,
  `submission_user_id` int(11) NOT NULL,
  `submission_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

CREATE TABLE IF NOT EXISTS `schemes` (
  `scheme_id` int(11) NOT NULL AUTO_INCREMENT,
  `scheme_name` varchar(300) NOT NULL,
  `scheme_funding` int(2) NOT NULL,
  `scheme_dept` int(2) NOT NULL,
  `scheme_objectives` text NOT NULL,
  `scheme_reginfo` text NOT NULL,
  `scheme_documents` text NOT NULL,
  `scheme_benefits` text NOT NULL,
  `scheme_flag` int(2) NOT NULL,
  `scheme_validation_count` int(11) NOT NULL,
  PRIMARY KEY (`scheme_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`scheme_id`, `scheme_name`, `scheme_funding`, `scheme_dept`, `scheme_objectives`, `scheme_reginfo`, `scheme_documents`, `scheme_benefits`, `scheme_flag`, `scheme_validation_count`) VALUES
(2, 'Mahatma Gandhi National Rural Employment Guarantee Scheme (MGNREGA)', 1, 0, 'To ensure livelihood and food security by providing unskilled work to people through creation of sustainable assets in rural areas.', '(a) Only adult members residing in rural areas and willing to do unskilled manual work may submit the names, age and  the address of the household to the Gram Panchayat at the village level, in whose  jurisdiction they reside, for registration of their household to the local Gram Panchayat. The unit for registration is a household</p>\r\n(b) Application for work can be either oral or written to the Ward Member or Gram Panchayat or Programme Officer. \r\nApplicants can also register via telephone or Interactive Voice Response System, or call centre, or web site or through a kiosk set up for this purpose or through any other means authorised by the State Government. \r\n(c) After due verification of place of residence and age of the member/s , the registered household is issued a Job Card. A Job Card is to be issued within 15 days of registration. Job Card forms the basis of identification for demanding employment. The job card issued shall be valid for atleast five years after which, it may be renewed after due verification.\r\n(d) The Gram Panchayat / Programme Officer will issue a dated receipt of the written application for employment, against which the guarantee of providing employment within 15 days operates.\r\n(e) Registration form and process are free of cost.', '(a) Job Card\r\n(b) Bank/Post Office Account', '(a) Benefit of guaranteed wage employment for 100 days in rural areas\r\n(b) NREGA workers are paid the statutory minimum wage applicable to agricultural workers in the State. Payment of wages in cash on a daily basis/If working on a piece-rate basis, ie for 7 hours, payment of minimum wages is applicable. \r\n(c) Injury or hospitalization of any labourer during the course of employment at work site is entitled to free medical treatment, medicines, hospital accomdation and also for daily allowance not less than 50% of the wage rate. \r\n(d) Safe drinking water, shade for children, periods of rest and first-aid box with adequate material for emergency treatment for minor injuries and other health  hazards connected with the work.', 1, 0),
(3, 'Yeshasvini Cooperative Farmers'' Health Care Scheme', 0, 1, '', '<p>(a) Enrollment commences from January/February and closes by August.</p>\r\n<p>(b) UHID (Unique Health Identification) enrollment form containing</p> predefined numbers using barcode reader are issued to the main member. \r\nIt is a pre-defined number using bar code reader. Beneficiaries holding UID number should approach the Yeshasvini network hospital. Each beneficiary has to pay a prescribed premium of Rs 250 annually. </p>\r\n<p>(c) Hospital checks whether the applicant is Yeshasvini beneficiary and whether the surgery is covered under Yeshasvini scheme. </p>\r\n<p>(d) Pre-authorization is sought from MSP through internet. The MSP gives pre authorization and then the hospital conducts surgery. </p>\r\n\r\nBill settlement-\r\n<p>(a) The hospital forwards bills to the MSP (Management Services Provider). The bills are scrutinised and sent to Yeshasvini Trust. \r\n<p>(b) Yeshasvini trust passes the bills and after approval in specified sub committee meetings, the payment is made to MSP. \r\n<p>(c) MSP inturn makes payment to the hospital</p>.', '(a) UHID (Unique Health Identification) card \r\n(b) Each enrolment form contains particulars of the main member and his family members name, age, relationship, society membership number, date and members photo etc.', '(a) Free surgery costing upto Rs.1.25 lakh and Rs.2.00 lakhs for multiple surgeries in one year. \r\n(b) Insurance limit is 2 lakh per annum per individual. 1 lakh per surgery per annum. \r\n(c) During surgeries, the beneficiaries are given cost of medicines, consumables during hospital stay, cost of Operation Theater, Anesthesia, surgeons fee, professional charge, consultation fee, nursing fee, general ward bed charges etc. \r\n(d) Free out patient consultation.\r\n(e) Discounted tariffs for lab investigations and tests.', 1, 0),
(4, 'Janani Suraksha Yojana (JSY)', 1, 2, 'To provide financial assistance to the poor pregnant women during delivery. \r\nTo increase institutional deliveries in BPL families.', 'Role of ASHA worker in registration process\r\n1. Identify pregnant woman as a beneficiary of the scheme and report or facilitate registration for ANC\r\n2. Assist the pregnant woman to obtain necessary certifications wherever necessary.\r\n3. Provide assistance to women in receiving at least three ANC checkups including TT injections, IFA tablets.\r\n4. Identify a functional Government health centre or an accredited private health institution for referral and delivery.\r\n5. Counsel for institutional delivery.\r\n6. Escort the beneficiary women to the pre-determined health center and stay with her till the woman is discharged.\r\n7. Arrange to immunize the newborn till the age of 14 weeks.\r\nInform about the birth or death of the child or mother to the ANM/MO.\r\n8. Post natal visit within 7 days of delivery to track mother’s health after delivery and facilitate in obtaining care, wherever necessary.\r\n9. Counsel for initiation of breastfeeding to the newborn within one-hour of delivery and its continuance till 3-6 months and promote family.', '1. BPL or a SC/ST certificate or certification of poor and needy status of the expectant mother’s family by the gram pradhan or ward member in High Performing States (HPS)\r\n2. Age Certificate in HPS\r\n3. Referral slip from the ASHA/ANM/MO where the pregnant woman generally resides\r\n4. Maternal and Child Health Card\r\n5. Janani Suraksha Yojana (JSY) card', 'Cash Assistance\r\nIn Karnataka, which belongs to High Performing State Category- \r\nRural areas- To the Mother-1400Rs as Cash incentive\r\nUrban areas- To the Mother-600Rs as Cash incentive\r\n\r\nCompensation amount under JSY for sterilization-Rs.1500/.', 1, 0),
(5, 'Indira Gandhi National Old Age Pension Scheme (IGNOAPS)', 2, 3, 'To provide pension to old people above the age of 60 who cannot fend for themselves and do not have any means of subsistence.', '(a) Identification of beneficiaries is done by the state government \r\nSubmission of filled application form MOAP-I to DCs/SDO of the districts or Dub division in which the applicant resides\r\n(b) Applications will be forwarded to the Director Social Welfare\r\n(c) Pension will be credited in a bank /post office account of the beneficiary', '(a) Medical Certificate : A certificate from a Medical Officer as a proof of age for the destitute person \r\n(b) Photograph: Two recent photographs with signature of the applicant duly attested by a Gazetted Officer.\r\n(c) Income Certificate: A certificate showing the annual income in prescribed format from DC/SDO/SDC or an employer in case of an employed Applicant/ Husband/ Wife/Son(s)/Daughter(s)/Grand Sons/grand Daughters', '(a)  Rs 200 per month is provided to persons of 60 years or higher and belonging to a BPL family \r\n(b) BPL persons post 80 years of age are eligible to receive Rs.500/month. \r\n(c) Additional pension in case of disability, loss of adult children and concomitant responsibility for grand children and women.', 1, 0),
(6, 'Bhagyalakshmi Scheme', 0, 4, 'To promote the birth of girl children in BPL families and to raise the status of the girl child in society.', '(a) The birth of the child should be compulsorily registered. Enrolment is allowed upto one year of the birth of child on production of birth certificate. \r\n(b) The child''s name should be compulsorily mentioned in the enrolment form.', '(a) Birth Certificate\r\n(b) Income certificate\r\n(c) Photograph of the child with parents\r\n(d) BPL card/ Ration Card\r\n(e) Immunization card if the girl child has received immunization\r\n(f) Marriage Certificate of parents', '(a) The girl child gets health insurance cover up to a maximum of Rs. 25000 a year, an annual scholarship of Rs 300 to Rs 1000 till X Standard.\r\nThe annual scholarship slab for each class is as given below\r\n1st standard to 3rd standard Rs.300/-\r\n4th standard     Rs.500/-\r\n5th standard     Rs.600/-\r\n6th standard to 7th standard  Rs.700/-\r\n8th standard     Rs.800/-\r\n9th standard to 10th standard  Rs.1000/-\r\n\r\n(b) Parents would get Rs. 1 lakh in case of an accident and Rs 42500 in case of natural death of the beneficiary. \r\n(c) On attainment of 18 years of age, the first girl beneficiary who fulfills the conditions of the scheme will get a maturity amount of Rs 1, 00,097 and the second girl beneficiary will receive Rs 1,00,052. \r\nThe annual scholarships and insurance benefits will be made available to the beneficiary on fulfilment of the eligibility criteria mentioned in the scheme.\r\n(d) The beneficiaries willing to continue higher education after passing Standard X are eligible to pledge the bond and avail a loan, up to a maximum of Rs 50,000 from recognized banks.', 1, 0),
(7, 'Arivu (Education Loan) Scheme', 0, 5, 'To provide financial assistance to minority students for completion of professional courses.', '(a) Applicants who desire to obtain the financial assistance from the corporation can obtain the prescribed application from the respective District office of the KMDC and  submit the application to the same offices. \r\n(b) District Manager after a scrutiny of the application and approval from the District Committe will authorize Head Office of Karnataka Minority Development Corporation for releasing the loan.', 'Documents to be submitted with application form:\r\n(a) Photograph of applicant 4-Passport size \r\n(b) Income Certificate \r\n(c) Caste Certificate\r\n(d ) PUC / Degree Marks card \r\n(e) Transfer Certificate \r\n(f)New Ration card or any other document for address proof\r\n(g) CET Admission order /College Admission order/CAC order \r\n(h) SSLC marks card for proof of Date of Birth \r\n(i)Study Certificate (Present course) \r\n\r\nDocuments to be submitted at the time of release of loan:\r\n(a) Agreement I - Surety affidavit on Rs. 50% paper along with 2 passport size photograph of Parents / Husband / Guardian. \r\n(b)Agreement II - Indemnity Bond on Rs. 100/- paper (to be signed before the notary)', 'Financial loan upto Rs 75000 per year to minority students till the completion of professional courses.', 1, 0),
(8, 'Shramashakthi Scheme', 0, 5, 'The loan will be sanctioned to the poor religious minority rural artisans to improve their economics status and to overcome BPL.', 'The applicant can dowload the application form from the KMDC website and submit the completed form to the department.', '(a) Attested copy of address proff\r\n(b) Caste Certificate\r\n(c ) Income Certificate\r\n(d) Documentary proof for estimated cost for start up\r\n(e ) Bank account details', '(a) Training to minority artisans to upgrade their artistic and technical skills\r\n(b) Loan of upto Rs.25000/- will be provided at a low rate of interest i.e., 4% to set up and improve their business. 75% will be considered as a loan and 25% will be considered as back end subsidy.', 1, 0),
(9, 'Thayi Bhagya', 0, 2, 'The scheme provides totally free service for the pregnant women belonging to BPL families in registered private hospitals.', 'The beneficiaries are identified through the ANC cards issued to them.', '(a) BPL card\r\n(b) ANC Card', 'Pregnant woman belonging to BPL family can avail delivery services free of cost in the registered private hospital near her house', 1, 0),
(10, 'Indira Awaas Yojana (IAY)', 2, 0, 'To help construction/upgradation of dwelling units of members of SC/ST, freed bonded labourers, minorities in the BPL families and BPL non-SC/ST rural households.', '(a) The Zilla Parishad/ Village Panchayat identify and rank the beneficiaries based on their poor status\r\n\r\n\r\n(b) The construction should be carried out by the beneficiary himself/herself. No contractor should be involved in the construction of houses under IAY. The house should also not be constructed by anyGovernment department/agency.', '', '(a) Lumpsum financial assistance to the eligible BPL and non-BPL families\r\n(i) Financial assistance for construction of a new house is Rs 70000- in plain areas and Rs 75000 in hilly/difficult/IAP areas. \r\n(ii) Financial assistance for upgradation of Kutcha or dilapidated house is Rs15000\r\n(iii) Financial assistance for acquiring house site is Rs 20000.\r\n\r\n(b)  An amount of Rs 20000 is provided for acquiring plot to an IAY beneficiary', 1, 0),
(11, 'Santhwana', 0, 4, 'To provide assistance to distressed women so as to help them to be self-reliant and achieve social and economic empowerment.', '', '', '(a) Legal assistance, temporary shelter, financial relief and training to distressed women.\r\n(b) If the woman is in immediate need of financial help an amount ranging from Rs. 2000/- to a maximum of Rs. 10000/- is sanctioned as financial relief.', 1, 0),
(12, 'Attendance Scholarship for girls from rural areas', 0, 4, 'Scholarship is provided to girls from rural areas to reduce the dropout rate in primary and secondary school levels to encourage education of girl children.', '', '(a) Caste/Community Certificate\r\n(b) BPL Certificate\r\n(c ) Income Certificate', '(a) An amount of Rs. 25/ per month for10 months is given to girls studying in 5th to 7th  standard\r\n(b) Rs. 50/-  per month is given to girls studying in 8th to 10th standard.', 1, 0),
(13, 'Anna Bhagya Yojana', 0, 6, 'To ensure food security among BPL households', '', '', '(a) Subsidized rice to BPL families-  Supply 30 kg foodgrains at Rs 1 per kg to BPL families\r\n      1.1 Single member cardholders would get 10 kg per month\r\n      1.2 Two-member ones 20 kg \r\n      1.3 Three and above would get a maximum of 30 kg ', 1, 0),
(14, 'Navachetana', 0, 3, 'To provide training to unemployed Scheduled Castes youths in various trades', '', '', '"(a) Training to SC unemployed youth to make them self-reliant\r\n(b) Various trades- crafts like Carpentry, Smithing, Fitters, Turners, Welders, Gear Cutting, Flute milling, Lathe, Automobile, Garments, hotel industry, Leather industry, IT sector, Hardware sector, TV repairs, Home appliances repairs, screen printing etc., depending upon the qualification of the candidate, his aptitude and skill.\r\n(c) Training is imparted through Govt, semi Govt, Public sector and reputed private sector organisations."\r\n', 0, 0),
(15, 'National Programme for Health Care of the Elderly (NPCHE)', 1, 2, 'To address various health related problems of elderly people.\r\n', '', '', 'Free, Specialized health care facilities exclusively for the elderly people through the State health delivery system.\r\n', 1, 0),
(16, 'Rashtriya Arogya Nidhi (RAN)\r\n', 1, 2, 'To provide financial assistance to patients belonging to BPL families\r\n', '', '"(a) Below Poverty Line ration card\r\n(b) Income certificate from Govt revenue authorities"\r\n', 'Financial assistance to poor patients for healthcare\r\n', 1, 0),
(17, 'Sandhya Surakshay Yojana (Ssy)\r\n', 2, 7, 'To help eligible elderly citizens by providing them with direct cash pensions.\r\n', '', '', 'Elderly pension\r\n', 1, 0),
(18, 'Annapoorna Yojana\r\n', 1, 8, 'To ensure food security for old desitutes\r\n', '', '', 'Old destitutes\r\n', 1, 0),
(19, 'National Family Benefit Scheme (NFBS)\r\n', 0, 0, 'To provide assistance to the poor and to ensure minimum national standard for social assistance.\r\n', '', '', 'The NFBS provides a lump sum family benefit of Rs. 10000 to the bereaved household in case of death of the primary bread winner irrespective of the cause of death.\r\n', 1, 0),
(20, 'MADILU\r\n', 1, 9, 'To encourage poor pregnant women to deliver in health centres and hospitals in order to considerably reduce maternal and infant mortality.\r\n', '', '', '"Kits containing 19 items essential to Mother & Baby in the post-delivery period are given to women in BPL category who have delivered in institutions.\r\nEach kit is worth Rs.825/ will be distributed free of cost to parents of each newborn child. It consists of 19 essential items for the benefit of mother and child."\r\n', 1, 0),
(21, 'Prasooti Araike\r\n', 0, 2, 'To provide assistance to pregnant women belonging to BPL families.\r\n', '', '', '"(a) Incentives to BPL women who belong to SC/ST category to help them during prenatal and postnatal period.\r\n(b) Rs.1500/-is given in cash and Rs.500/-in kind to compensate wage loss."\r\n', 1, 0),
(22, 'Rashtriya Swasthya Bhima Yojana (RSBY)\r\n', 1, 9, 'To provide protection to BPL households from financial liabilities arising out of health shocks that involve hospitalization\r\n', '"(a) An electronic list of eligible BPL households is provided to the insurer.\r\n(b) The list is posted in each village prior to the enrollment and the date and\r\nlocation is publicized in advance. \r\n(c)Mobile stations are set up at local centers (e.g., public schools). These stations are equipped with the hardware required to collect biometric information (fingerprints) of the members of the household covered and to print smart cards with a photo. \r\n(d)  The smart card along with an information pamphlet describing the scheme and\r\nthe list of hospitals is provided.\r\n(e) Nominal registration fee is 30 rupees"\r\n', '"(a) BPL card\r\n(b) Smart card"\r\n', '"(a) Access to BPL families to quality medical care for treatment involving hospitalization and surgery among health care providers. \r\nInsurance limit is Rs 30000 per annum for a family of 5 members. \r\n(b) Transportation cost of Rs. 100/? per visit with an overall limit of Rs. 1,000/? per annum is also admissible under the scheme.  "\r\n', 1, 0),
(33, 'Vikas Scheme', 1, 1, '', '', '', '', 0, 0),
(34, 'New Scheme', 1, 1, '', '', '', '', 0, 0),
(35, 'dfsdfsdfds', 1, 1, '', '', '', '', 0, 0),
(36, 'Vikas', 1, 1, '', 'safsadfsadf', 'asdfsafsd', 'ssdfsddsf', 0, 0),
(37, 'Vikas', 1, 1, '', 'safsadfsadf', 'asdfsafsd', 'ssdfsddsf', 0, 0),
(38, 'sadfsadf', 1, 1, '', 'sdsfsdf', '', 'dssdfsdf', 0, 0),
(39, 'sadfsadf', 1, 1, '', 'sdsfsdf', '', 'dssdfsdf', 0, 0),
(40, 'Viki', 1, 1, '', 'A quick brown fox jumps over the lazy dog', 'A quick brown fox jumps over the lazy dog ', 'A quick brown fox jumps over the lazy dog', 0, 0),
(41, 'Viki', 1, 1, '', 'A quick brown fox jumps over the lazy dog', 'A quick brown fox jumps over the lazy dog ', 'A quick brown fox jumps over the lazy dog', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_key` varchar(32) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_key`) VALUES
(1, 'a83dd5883f311e191d95cf395db56cd5'),
(2, 'aa5a50701fb786f53bcfb4e47edbefad'),
(3, '353d2b217cd0e6180a6fc3fcf4936bc5'),
(4, 'abca11c951637fdbf1c2be74af292e19');

-- --------------------------------------------------------

--
-- Table structure for table `sms_table`
--

CREATE TABLE IF NOT EXISTS `sms_table` (
  `number` int(11) NOT NULL,
  `sms` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_table`
--

INSERT INTO `sms_table` (`number`, `sms`) VALUES
(2147483647, '111232323'),
(1232324, 'Vikas Yadav'),
(2323455, 'Sammy'),
(23234, 'Someone Else');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(300) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_number` varchar(12) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_number`, `user_type`) VALUES
(1, 'testuser', 'testuser@gmail.com', '102636936d97c3ed05efee6ffde5ccc0', '1234567890', 2),
(2, 'Vikas Yadav', 'vikasyadavgood@gmail.com', 'thanks123', '2342342342', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
