-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 08:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `open_ai`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item1_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `header1`, `header2`, `about_us`, `image`, `image2`, `item1_title`, `item2_title`, `item3_title`, `item1_qty`, `item2_qty`, `item3_qty`, `created_at`, `updated_at`) VALUES
(1, 'We’re Confident You’d', 'Feel Business', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which</p>\r\n<ul>\r\n<li>Get more customers on Best Digital Business Card Solution.</li>\r\n<li>There are many variations of passages of Lorem Ipsum available</li>\r\n<li>but the majority ha ve suffered alteration in some form</li>\r\n<li>Majority ha ve suffered alteration in some form</li>\r\n<li>Customers on Best Digital Business Card Solution.</li>\r\n</ul>', 'uploads/website-images/about-us-2023-02-14-01-55-43-4977.png', 'uploads/website-images/about-us-2023-02-14-01-55-55-6609.jpg', 'Satisfied Customer', 'Happy Clints', 'Years Of Experience', '9999', '1550', '1630', '2022-01-30 12:30:23', '2023-02-14 08:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_type` int(10) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `forget_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_type`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `status`, `forget_password_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'admin@gmail.com', 'uploads/website-images/john-doe-2022-12-25-04-13-32-5577.jpg', NULL, '$2y$10$7qpJpPvMnxgPG7g9SngM2OVNGCObKuXnSzPBF8yMZ/JJL/020S/f6', NULL, 1, NULL, NULL, '2023-02-18 03:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `ai_histories`
--

CREATE TABLE `ai_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ai_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_edit` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ai_histories`
--

INSERT INTO `ai_histories` (`id`, `user_id`, `title`, `total_word`, `ai_content`, `is_edit`, `created_at`, `updated_at`) VALUES
(4, 1, 'Business Idea', '64', ', mysql&lt;br&gt;\r\n&lt;br&gt;\r\nStart a web development agency that focuses on custom web application development built with the Laravel framework and MySQL. Leverage my experience in developing high-performing web applications and build customized solutions catered to each client&#039;s needs. Offer services like website development, web application development, and plugin customization to both small businesses and corporations. Additionally, offer website maintenance service packages with 24/7 support and monitoring.', 0, '2023-02-15 06:58:51', '2023-02-16 03:59:58'),
(6, 1, 'Ai-document', '96', '\n\nMy business idea is to create a website where I can offer web development services on Fiverr. My services would include php programming, larave app development, and mysql database design and maintenance. I would provide an efficient and cost-effective service to my clients by using the most up-to-date technologies and software. Additionally, I would provide consulting services to guide clients through any technical issues they may be facing during the development process. I believe this business would be successful due to the growing demand for web development services and the excellent customer service I will provide.', 0, '2023-02-15 07:14:26', '2023-02-15 07:14:26'),
(7, 1, 'Ai-document', '105', ', software and web.\n\nMy business idea is an online platform that specializes in selling mobile phone accessories, electric accessories, software, and web services. The platform would either offer products from various manufacturers or provide custom-made services that cater to individual customer needs. It would also allow customers to compare prices, review products, and talk to customer service representatives. As part of the platform, customers would be able to purchase items online directly via their preferred payment method. The platform would also offer free delivery for certain orders, and discounted prices for bulk orders. Finally, the platform could provide ongoing software and web support for customers.', 0, '2023-02-15 07:17:32', '2023-02-15 07:17:32'),
(8, 1, 'Ai-document', '122', ' \nsuch as power banks, chargers, phone cases, earbuds, and portable speakers. \nMy target audience is people who need reliable and affordable electric accessories. \nMy platform will offer a wide selection of products from various brands to suit different budgets and needs. \nThe platform will also offer discounts on select items during special occasions. \nIt will also feature informative reviews from customers and helpful how-to guides to make product selection easier. \nIn addition, the platform will provide customer support and guarantee service, as well as product warranties. \nUsers will also be able to track their orders, find deals and coupons, and save their search history. \nLastly, the platform will have an integrated mobile app so customers can purchase electric accessories on the go.', 0, '2023-02-15 07:19:34', '2023-02-15 07:19:34'),
(9, 1, 'Ai-document', '294', 'In a season where teams continued to make history, four more added another chapter in the state championships.\n\nThe West Lincoln Lady Bears (2A) won their first state title since 1977. The Loyd Star Lady Hornets (3A), Tylertown Lady Eagles (4A) and Florence Lady Eagles (5A) also added to their collection of hardware with the 2020-21 titles.\n\nThose four squads represent the first time in MHSAA history three teams from south Mississippi won a girls basketball championship in the same season.\n\nWest Lincoln (31-8) defeated Smithville 61-34 in the title game behind 17 points from Jana Case, who was named the 2A Most Valuable Player. The Lady Bears went undefeated in League 7-2A and made easy work of their tournament opponents. West Lincoln beat Enterprise (61-34), Myrtle (62-26) and East Union (59-25) before claiming their crown.\n\nLoyd Star (30-2) held off a tough Belmont team (41-37) to win the 3A state title. The Lady Hornets trailed by eight in the fourth quarter, but outscored Belmont 25-14 in the final frame to claim their second title in four years. Jordan Layton, who finished with 21 points, 12 rebounds, three blocks and two steals, was named MVP.\n\nTylertown (28-7) captured the 5A state title with a 53-44 victory over Humphreys County. The Lady Eagles were down one point at halftime before outscoring Humphreys County 10-2 to start the third quarter. Aja Jones led the way with 16 points and was named MVP. Tylertown has now won three state titles in the past seven seasons.\n\nFlorence (25-5) won its second consecutive 5A state title, defeating Amory 60-48. The Lady Eagles led by just four at intermission before outscoring Amory 22-13 in the third quarter. Caitlin Abernathy had 14 points, five rebounds and three assists, earning MVP honors.\n\nCopyright 2021 WLOX. All rights reserved.', 0, '2023-02-15 09:18:15', '2023-02-15 09:18:15'),
(10, 1, 'Ai-document', '270', 'As a manager of the financial services advisory, you need to provide a client with advice on the most suitable investment options available. Outline the steps you would take to do this.\n\n1. Gather Client Information: First, you need to assess the goals and objectives of the client and gather information such as the client\'s age, assets, income, risk tolerance, and any other relevant data. This will enable you to determine what type of investments are best suited to meet their needs. It is important to get a clear understanding of the client\'s financial situation and goals in order to provide sound advice.\n\n2. Analyze Investment Options: Once you have gathered the necessary information about the client, you\'ll need to research different available investments that could match the client\'s goals and objectives. You should look for investments with a reasonable return and low risk, as well as research their past performance.\n\n3. Analyze the Market Conditions: You should also look at the current market conditions to determine whether a particular type of investment could outperform others. This could include looking at the interest rates, housing market indicators, and global economic outlook.\n\n4. Present Advice and Recommendations: Based on your analysis, you should present the client with your advice and recommendations regarding suitable investment options. Explain why each option is right for them and how it could potentially help them reach their goals.\n\n5. Monitor Performance: Lastly, you should periodically monitor the performance of the investments you recommend to make sure they are meeting the client\'s objectives. If the investments are not performing as expected, you may need to suggest alternative options or restructure the portfolio.', 0, '2023-02-15 09:20:02', '2023-02-15 09:20:02'),
(11, 1, 'Ai-document', '181', '\n\nBlog Idea: Web Design Tips to Help You Stand Out in a Crowded Marketplace \n\nOutline:\n1. Introduction: \n      a. Overview of why web design is important for businesses today \n2. Understand Your Target Market: \n      a. Conduct research to understand who you’re creating the website for \n      b. Ask questions about their preferences, interests, and needs \n3. Choose an Appropriate Platform: \n      a. Consider all available platforms, including WordPress, Shopify, Wix, and more \n4. Make it User Friendly: \n      a. Optimize for mobile devices and ensure easy navigation \n5. Build with SEO in Mind: \n      a. Utilize SEO techniques, such as keyword research, backlinks, and meta-tags \n6. Don’t Forget About Aesthetics: \n      a. Use visuals that match your brand’s identity \n      b. Pick colors and fonts that convey the right message \n7. Include Necessary Features: \n      a. Ensure the website includes features that cater to the user\'s needs \n      b. Consider adding an ecommerce feature if selling products or services through the site \n8. Test and Measure Performance: \n      a. Gather user feedback and test to track performance and make necessary improvements over time \n9. Conclusion: \n      a. Summarize the benefits of following these tips when creating a website', 0, '2023-02-15 09:26:40', '2023-02-15 09:26:40'),
(12, 1, 'Ai-document', '304', '\n\nHaving an online presence for your business is essential in this day and age. Not only does it allow you to reach a wider audience than ever before, but it also offers plenty of opportunities to boost your brand. If you\'re looking to get a website up and running quickly and cost-effectively, then Laravel website development may be the perfect solution.\n\nLaravel is one of the most popular PHP frameworks available, offering fast development times, scalability, and ease of use. It\'s built on modern concepts such as Model-View-Controller (MVC), object-oriented programming, and industry best practices, making it the perfect choice for businesses of any size.\n\nWhen developing a website with Laravel, you\'ll benefit from an array of features such as a templating system, authentication, caching, and more. In addition to this, you\'ll be able to tap into its huge library of packages, which can help you add functionality to your site without having to write complex code.\n\nOne of the biggest advantages to using Laravel for website development is that it helps speed up the process. As a full-stack framework, Laravel includes everything you need to get started, from routing to database integration. This means you won\'t have to waste time piecing together different components manually - it\'s all there in one package.\n\nOther benefits of using Laravel for website development include its security measures, built-in testing tools, and modular structure. The framework also comes with excellent documentation, so you can quickly find answers to any questions you might have.\n\nOverall, Laravel is an excellent choice for all types of websites, whether you\'re creating a blog, e-commerce store, or private web app. It offers features, tools, and scalability that make it well suited to a wide range of businesses. So, if you\'re serious about developing a professional website, then consider giving Laravel a try.', 0, '2023-02-15 09:58:03', '2023-02-15 09:58:03'),
(13, 1, 'Ai-document', '183', '\n\nDear Hiring Manager,\n\nI am writing to apply for the Junior Laravel Developer role at your company. I believe my skills in PHP, Laravel, and MySQL make me an ideal candidate for this position.\n\nI have worked as a software developer since I graduated with a degree in Computer Science. Most recently, I completed a one-year contract as a Junior Web Developer at a small start-up, where I developed and maintained several web-based applications using Laravel. I also wrote custom solutions for various customer requirements and managed projects from start to finish.\n\nIn addition to my experience with Laravel, I am comfortable working with HTML, CSS, JavaScript, and MySQL. I am familiar with industry standard frameworks and technologies, including Cloud Computing and DevOps. I am also capable of learning new technologies quickly, as evidenced by my previous projects.\n\nI am confident my technical expertise and background in web development make me an excellent fit for the role of Junior Laravel Developer. I would love the opportunity to discuss my qualifications in greater detail and look forward to hearing from you.\n\nSincerely,\n\n[Your Name]', 0, '2023-02-15 10:41:11', '2023-02-15 10:41:11'),
(14, 1, 'Ai-document', '97', '\n\nFacebook Ad: \nIntroducing the new and improved iPhone! Get the latest features, faster speeds, and more with the latest model today. Get yours now and feel the power of the iPhone! #iPhone #Technology \n\nTwitter Ad: \nReady to experience the newest iPhone? Get the latest model and feel the power of this sleek and fast device. #iPhone #Technology \n\nLinkedIn Ad:\nUpgrade to the newest iPhone based on cutting edge technology. Get the latest features and feel the power of this amazing device. Get yours now and experience the best of what the iPhone has to offer. #iPhone #Technology', 0, '2023-02-15 11:16:26', '2023-02-15 11:16:26'),
(15, 1, 'Ai-document', '40', '\n\nMake your next outdoor adventure a success with {Product Name}! We specialize in outdoor gear and apparel, so you can find everything you need for the perfect outdoor getaway. Shop {Product Name} now for top-quality outdoor products at unbeatable prices!', 0, '2023-02-15 11:21:28', '2023-02-15 11:21:28'),
(16, 1, 'Ai-document', '24', '\n\nSearch for Life-Changing Apps with [Product Name]! Get the best apps for organization, productivity and relaxation. Accessible on all devices. Try [Product Name] Now!', 0, '2023-02-15 11:22:01', '2023-02-15 11:22:01'),
(17, 1, 'Ai-document', '60', '\n\n1. \"Discover the Magic of [My Product Name]! Get the Latest Gadget & Stay Ahead of the Curve!\" \n2. \"Say Goodbye to Everyday Struggle - [My Product Name] Makes Life Easier!\" \n3. \"Upgrade to [My Product Name] and Enjoy Easier Workflows & Higher Efficiency!\" \n4. \"The King of Gadgets is Here - Introducing [My Product Name]!\" \n5. \"Introducing [My Product Name] - Get the Ultimate Gadget Now!\"', 0, '2023-02-15 11:22:34', '2023-02-15 11:22:34'),
(18, 1, 'Ai-document', '69', '\n\n1. \"Get Ready for the Big Game with [Product Name]! Get the perfect gear and accessories to create a winning look. Shop now at [Product Name]!\"\n\n2. \"Calling All Sports Fans! Get [Product Name] to be prepared for the big game and all your favorite teams. Shop Now!\" \n\n3. \"Gear Up for the Next Big Game with [Product Name]. Best prices on quality sports gear and accessories online. Check us out today!\"', 0, '2023-02-15 11:23:27', '2023-02-15 11:23:27'),
(19, 1, 'Ai-document', '58', '\n\nAre you looking for furniture that will transform your home? Look no further than [Furniture Store Name]! Our wide selection of high-quality furniture is perfect for attaining a modern, chic look in any room. Plus, with our unbeatable prices, you\'re sure to find something that suits your budget. Shop now and get free shipping when you spend over $100!', 0, '2023-02-15 11:25:54', '2023-02-15 11:25:54'),
(20, 1, 'Ai-document', '59', '\n\nGet the Best Portable Generator Now - Save Big!\nDiscover our top-rated selection of high-performance portable generators that offer the best in convenience and power. With an array of great features like low noise output, easy portability, and fuel efficiency, you\'re sure to find the perfect generator for your needs. Shop now and save big on your next purchase!', 0, '2023-02-15 11:32:00', '2023-02-15 11:32:00'),
(21, 1, 'Ai-document', '49', '.\n\nIntroducing the newest innovation in [product] technology! Our [product] offers unmatched functionality, cutting-edge features, and a user-friendly interface. Perfect for both beginner and expert users alike, our [product] is the perfect choice to take your [task] to the next level. Get yours today and experience the power of [product]!', 0, '2023-02-15 11:35:10', '2023-02-15 11:35:10'),
(22, 1, 'Ai-document', '68', ' for it.\n\nIntroducing [Product Name], your all-in-one solution for [describe what the product does]. We offer a suite of innovative features designed to accommodate all of your [list of what the product does] needs. With [Product Name], you can easily [list of benefits associated with product]. Trust us to provide you with an unparalleled level of convenience, efficiency, and reliability. Try [Product Name] today and experience the difference!', 0, '2023-02-15 11:47:13', '2023-02-15 11:47:13'),
(23, 1, 'Ai-document', '42', '\n\nNever worry about your phone battery dying again! Get our mobile phone charger and stay connected all day long. With an extra long cable, our charger will charge your device wherever you may be. Buy now and carry it with you everywhere!', 0, '2023-02-15 11:49:46', '2023-02-15 11:49:46'),
(24, 1, 'Ai-document', '80', ' \n\n1. Introduction to PHP and Basics of YouTube Video Creation \n2. Using PHP to Create Basic YouTube Videos\n3. Understanding the YouTube Video Editing Platform \n4. Adding Customization to YouTube Videos with PHP \n5. Troubleshooting Errors When Working with YouTube Videos in PHP \n6. Optimizing Your YouTube Video for SEO \n7. Advanced Techniques for YouTube Video Creation using PHP\n8. How to Create Professional Quality YouTube Videos with PHP \n9. Creating Engaging Thumbnails for Your YouTube Videos using PHP \n10. Leveraging Analytics to Improve Your YouTube Video Performance with PHP', 0, '2023-02-15 11:55:49', '2023-02-15 11:55:49'),
(25, 1, 'Ai-document', '80', '\n\nThis PHP tutorial video is perfect for beginner developers who are looking to gain an understanding of the popular programming language. It will teach you the basics of coding and help you develop the skills necessary to become a PHP programmer. Learn how to create database-driven websites and applications with ease. Topics covered include: setting up a development environment, object-oriented programming principles, creating dynamic webpages, and much more. With this tutorial, you\'ll be building professional PHP projects in no time!', 0, '2023-02-15 12:02:52', '2023-02-15 12:02:52'),
(26, 1, 'Ai-document', '66', '\n\n1. \"Top-Notch Website Development with PHP and Laravel\" \n2. \"Unparalleled Website Design with Laravel and PHP\" \n3. \"Achieve Maximum Website Performance with Laravel and PHP\" \n4. \"Revolutionize Your Website Developement with PHP and Laravel\" \n5. \"Optimize Your Web Presence with PHP and Laravel\"\n6. \"High Quality Website Design with Laravel and PHP\" \n7. \"Take Your Website Developement to the Next Level with PHP and Laravel\"\n8. \"Boost Your Website Results with Laravel and PHP\"', 0, '2023-02-15 12:09:34', '2023-02-15 12:09:34'),
(27, 1, 'Php website development', '159', '&lt;br /&gt;\r\n&lt;br /&gt;\r\n1. &quot;We offer the best PHP and Laravel website development services. Our experienced team is well-versed in creating custom sites for businesses of all sizes that are fast, secure, and optimized for maximum performance.&quot;&lt;br /&gt;\r\n&lt;br /&gt;\r\n2. &quot;Hire our web development experts to create an innovative website using the powerful Laravel and PHP frameworks. Get the benefit of modern technologies and experience the highest level of service with us.&quot;&lt;br /&gt;\r\n&lt;br /&gt;\r\n3. &quot;Our expert developers can help you build a robust PHP and Laravel web application that is search engine optimized. Experience better performance, scalability and flexibility from your web presence with us.&quot;&lt;br /&gt;\r\n&lt;br /&gt;\r\n4. &quot;Looking for the perfect website to help your business grow? Whether you need custom design for your business or fully optimized PHP &amp; Laravel site, our team is here to help!&quot; &lt;br /&gt;\r\n&lt;br /&gt;\r\n5. &quot;We use modern tools, such as Laravel and PHP, to create fast, user-friendly and SEO friendly websites. Let us help you make the most of your online presence with our website development services.&quot;', 1, '2023-02-15 12:18:23', '2023-02-16 04:42:32'),
(28, 1, 'Ai-document', '65', '\n\nPost: ChatGPT is the latest artificial intelligence technology that enables users to communicate with bots in a natural, human-like way. With the help of sophisticated algorithms, a user can ask questions and receive intelligent, personalized responses from the bots, allowing for more efficient conversations.\n\nCaption: Introducing ChatGPT – the revolutionary AI technology that allows you to talk with bots like they’re real people! #chatgpt #AItalk', 0, '2023-02-16 03:09:40', '2023-02-16 03:09:40'),
(29, 1, 'Google ads for mobile charger', '98', 'This high-quality mobile phone charger is perfect for anyone who needs to keep their device powered and ready to go. With state-of-the-art technology and an exclusive design, you can be sure your phone is always juiced up. Our charger is designed to charge quickly, safely and efficiently, so you don&#039;t have to worry about any power issues or overheating. It&#039;s also intuitive to use and comes with a detachable USB cable for connecting to your device. Whether you&#039;re traveling or staying connected at home, this mobile phone charger is the ideal companion for keeping your device fully charged.', 0, '2023-02-16 03:16:55', '2023-02-16 04:18:35'),
(30, 1, 'Ai-document', '32', '1. Web Development &lt;br&gt;\r\n2. PHP &lt;br&gt;\r\n3. Laravel &lt;br&gt;\r\n4. Database Management &lt;br&gt;\r\n5. Web Design &lt;br&gt;\r\n6. Web Programming &lt;br&gt;\r\n7. HTML/CSS &lt;br&gt;\r\n8. JavaScript &lt;br&gt;\r\n9. MVC Architecture &lt;br&gt;\r\n10. Frameworks &lt;br&gt;\r\n11. Application Development &lt;br&gt;\r\n12. Responsive Design &lt;br&gt;\r\n13. User Interface Design &lt;br&gt;\r\n14. Content Management Systems &lt;br&gt;\r\n15. Git Version Control &lt;br&gt;\r\n16. Search Engine Optimization', 0, '2023-02-16 03:21:50', '2023-02-16 04:39:58'),
(31, 1, 'Laravel Developer', '183', '&lt;br&gt;\r\n&lt;br&gt;\r\nDear (Hiring Manager&#039;s Name),&lt;br&gt;\r\n&lt;br&gt;\r\nI am writing to apply for the position of Junior PHP Developer as recently advertised. With over two years of experience in developing effective web solutions, I believe I have the required technical skills and ambition to become a great asset to your team.&lt;br&gt;\r\n&lt;br&gt;\r\nMy current role requires me to design, code and maintain websites using a wide range of technologies, and I take great pride in creating highly functional and creative projects that exceed client expectations. My core competencies include PHP, Laravel, MySQL, HTML, CSS and Bootstrap. This, combined with strong problem-solving abilities, attention to detail and excellent communication skills gives me a distinct advantage.&lt;br&gt;\r\n&lt;br&gt;\r\nI am passionate about development and I am confident that I can make a positive contribution to your organisation. I look forward to a stimulating and rewarding professional working environment in which I can take on new challenges and grow my expertise.&lt;br&gt;\r\n&lt;br&gt;\r\nPlease feel free to contact me at [Insert Contact Details] to arrange an interview or if you require any additional information.&lt;br&gt;\r\n&lt;br&gt;\r\nThank you for your time and consideration.&lt;br&gt;\r\n&lt;br&gt;\r\nSincerely,&lt;br&gt;\r\n[Your Name]', 0, '2023-02-16 03:29:54', '2023-02-16 03:57:41'),
(32, 1, 'Application for php developer', '232', '&lt;p&gt;I am writing to express my interest in the position of PHP Developer at your organization&lt;/p&gt;&lt;p&gt;&lt;br&gt;\r\nI am writing to express my interest in the position of PHP Developer at your organization&lt;/p&gt;&lt;p&gt;&lt;br&gt;\r\nI am writing to express my interest in the position of PHP Developer at your organization&lt;/p&gt;&lt;p&gt;&lt;br&gt;\r\nI am witing to express my interest in the position of PHP Developer at your organization&lt;/p&gt;', 1, '2023-02-16 03:39:44', '2023-02-16 04:41:45'),
(33, 1, 'Ai-document', '173', '\n\nDear Hiring Manager,\n\nI am writing to express my strong interest in the Frontend Developer position at your company. \n\nWith 1+ years of experience developing frontend applications and a wealth of knowledge in ReactJS, HTML, and CSS, I believe I am a perfect match for this role. \n\nDuring my time as a Frontend Developer, I have been responsible for developing responsive websites, creating HTML/CSS prototypes for web and mobile applications, and managing code updates for existing sites and applications. My experience has also included utilizing libraries like React, jQuery, and Bootstrap to create different projects. I have had the opportunities to work with stakeholders from various departments which enabled me to collaborate effectively while addressing various challenges which these projects involved. \n\nI am confident that the combination of my technical expertise and dedicated approach will enable me to add value to your company and contribute to its success. I would like to discuss further how my skills and expertise can benefit your organization.\n\nThank you for your time and consideration.\n\nSincerely,\n[Your Name]', 0, '2023-02-16 04:51:18', '2023-02-16 04:51:18'),
(34, 1, 'Php video tutorial Idea', '76', '&lt;p&gt;1. Introduction to PHP: A tutorial for beginners&lt;br&gt;2. How to use variables and constants in PHP&lt;br&gt;3. Working with data types in PHP&lt;br&gt;4. Working with functions, classes and objects in PHP&lt;br&gt;5. How to perform basic operations such as loops and arithmetic in PHP&lt;br&gt;6. Working with files and directories in PHP&lt;br&gt;7. Introduction to databases and SQL in PHP&lt;br&gt;8. Advanced concepts like OOP (Object-Oriented Programming) in PHP&lt;br&gt;9. Creating a basic website using PHP&lt;br&gt;10.Creating a basic web application using PHP&lt;/p&gt;', 1, '2023-02-16 04:52:40', '2023-02-16 04:54:58'),
(35, 1, 'Ai-document', '49', '\n\nI would like to start a web development business using my PHP and Laravel expertise. I plan to offer custom website design and development services to small and medium businesses. I will also offer maintenance and training services to ensure that clients can manage their websites easily and effectively.', 0, '2023-02-16 05:59:47', '2023-02-16 05:59:47'),
(36, 1, 'Ai-document', '110', '\n\nI am suggesting a web development solution for small businesses. This solution will be built with the popular open source web development tool, Laravel. The solution will enable small business owners to quickly and easily set up and manage their websites. It will include features such as custom page design, eCommerce integration, powerful analytics, secure hosting, and robust marketing tools. The solution would be offered as an all-in-one package, allowing businesses to quickly get up and running without the need to hire a separate web development team. This solution would help small business owners save both time and money, allowing them to focus on what matters most – growing their business.', 0, '2023-02-16 06:00:27', '2023-02-16 06:00:27'),
(37, 1, 'Ai-document', '397', '\n\nPHP website development has become extremely popular due to its ease of use and familiarity among developers. It offers a variety of tools, plugins, and frameworks that make the development process much easier and faster. In addition, it is fast and cost-effective, allowing businesses to stay within budget while getting a dynamic site that meets their needs.\n\nWhen creating a website with PHP, developers need to select the appropriate framework. Frameworks are used to provide structure in the web development process and help keep code organized. They also allow for quick reusability of code and modules that can be modified and tailored to meet specific needs. Popular frameworks include Symfony, Zend, CodeIgniter, and CakePHP, all of which enable developers to move quickly from concept to completion.\n\nThe next step in PHP website development is selecting the appropriate content management system (CMS). A CMS allows developers to easily manage content, including images, videos, and text, without needing to know HTML or write additional code. Popular CMSs include WordPress, Drupal, and Joomla, which can be quickly set up and configured to meet a variety of needs.\n\nIn addition to selecting the right framework and CMS, developers should also spend time selecting the appropriate plugins, themes, and extensions that make the site more manageable, attractive, and functional. Plugins are often free and can provide extra features and functionality. Themes can be selected to make the look and feel of the site attractive and consistent. Extensions offer more advanced features, such as shopping carts, forums, and social media integration.\n\nFinally, when developing in PHP it is important to ensure the security of the website through proper coding practices and best security practices. Developers should never use default passwords or insecure encryption techniques, and should always practice secure coding techniques. Additionally, they should use server-side programming languages as much as possible, as these are less vulnerable to external attacks.\n\nIn conclusion, PHP website development is a great choice for businesses looking for a fast and cost-effective solution to get their sites up and running quickly. It offers a variety of tools and frameworks that enable developers to quickly and efficiently create dynamic websites. Additionally, the wide variety of plugins, themes, and extensions available allow developers to customize sites to meet specific needs. Finally, careful attention must be paid to coding practices and security to ensure the safety and integrity of the site.', 0, '2023-02-16 06:04:51', '2023-02-16 06:04:51'),
(38, 1, 'Ai-document', '154', '\n\nBlog Idea: How PHP Website Development Can Help Your Business\n\nOutline: \n1. Introduction: Definition of PHP; Overview of why it is important for website development.\n2. Advantages of PHP Website Development\n    a. Cost Savings \n    b. Platform Flexibility\n    c. Scalability\n3. Tips for Choosing the Right PHP Developer\n    a. Experience\n    b. Quality of Work\n    c. Communication\n4. Challenges Involved in PHP Website Development\n    a. Security Issues\n    b. Performance Issues\n    c. Limitations of the Framework\n5. Conclusion: Summarize the key points of the blog.\n\nConclusion:\nPHP is an important language to use when it comes to website development. It provides businesses with cost savings, platform flexibility, and scalability. When choosing a PHP developer, experience, quality of work, and communication should be taken into account. There are also security, performance, and limitation issues that should be considered when using PHP for website development. Despite the potential challenges, using the right developer can help your business reap the benefits of PHP website development.', 0, '2023-02-16 06:06:35', '2023-02-16 06:06:35'),
(39, 1, 'How to use chat gpt', '82', '&lt;p&gt;&lt;br&gt;&lt;br&gt;1. Install the GPT-Chatbot library onto your device or computer.&lt;br&gt;&lt;br&gt;2. Import a pre-trained model, or create your own custom model, by following the instructions in the GPT-Chatbot documentation.&lt;br&gt;&lt;br&gt;3. Create an interactive chatbot session by calling the provided &quot;start_chat&quot; function.&lt;br&gt;&lt;br&gt;4. Ask your chatbot questions and provide input to it, using natural language as if you were talking to another person.&lt;br&gt;&lt;br&gt;5. Monitor the chatbot&#039;s responses and determine if you need to adjust the model parameters, or provide additional training data, to ensure accurate responses.&lt;/p&gt;', 1, '2023-02-18 04:46:59', '2023-02-18 04:47:19'),
(40, 1, 'What is open ai', '66', '&lt;p&gt;&lt;br&gt;&lt;br&gt;OpenAI is a research laboratory based in San Francisco, California, focused on developing artificial general intelligence (AGI) to benefit humanity. It is focused on providing the public with widely accessible AI technologies such as natural language processing, virtual environments, reinforcement learning, unsupervised learning, robotics, and other ML-related tools and resources. OpenAI has developed several applications, including language models such as GPT-3, as well as robotics systems.&lt;/p&gt;', 1, '2023-02-18 04:50:23', '2023-02-18 04:50:39'),
(41, 1, 'About Codecanyon', '38', '&lt;p&gt;&lt;br&gt;&lt;br&gt;Yes, Codecanyon is an online marketplace for buying and selling website scripts, code components, plugins, graphics, and more. It is one of the most popular venues for finding high-quality digital products used to create websites and web applications.&lt;/p&gt;', 1, '2023-02-18 06:36:49', '2023-02-18 06:37:13'),
(42, 1, 'What is PHP ?', '48', '&lt;p&gt;&lt;br&gt;&lt;br&gt;PHP (Hypertext Preprocessor) is a server-side scripting language used for creating dynamic webpages. It is a widely used, open-source language, which is written in plain text format and embedded into HTML documents. PHP enables users to interact with databases, create session tracking and manage website content more easily.&lt;/p&gt;', 1, '2023-02-18 07:43:42', '2023-02-18 07:44:18'),
(43, 1, 'Ai-document', '75', '\n\nTopic: How to Maximize Your ROI with an Ecommerce Website\n\nOutline:\n\n1. Introduction – Definition of ecommerce and overview of how it works\n\n2. Benefits of investing in an ecommerce website\nIncreased customer reach\nEase of use and accessibility \n24/7 availability \n3. Tips to maximize ROI\nDevelop a thorough marketing strategy \nMake sure your website is secure and user-friendly\nFocus on SEO optimization \nDesign for mobile devices \n4. Conclusion – Summary of key points and encouragement to invest in an ecommerce website', 0, '2023-02-18 10:39:36', '2023-02-18 10:39:36'),
(44, 1, 'Ai-document', '74', '\n\nPost: \nAre you looking to build a new website or upgrade your existing one? Hire a PHP developer! With their extensive knowledge, they can create a customized website or system tailored to meet your specific needs. From simple fixes to complex coding projects, a talented PHP developer is the right choice for any job.\n\nCaption: Need a website upgrade? Get the perfect website with the help of a talented PHP developer! # phpdeveloper # websites # codingskills', 0, '2023-02-19 09:27:40', '2023-02-19 09:27:40'),
(45, 1, 'Ai-document', '20', '\n\n1. Artificial Intelligence\n2. Machine Learning\n3. Robotics\n4. Natural Language Processing\n5. Deep Learning\n6. AI Algorithms\n7. Data Science\n8. Cognitive Computing\n9. Neural Networks\n10. Autonomous Agents', 0, '2023-02-20 06:36:35', '2023-02-20 06:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `bank_payments`
--

CREATE TABLE `bank_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `account_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_payments`
--

INSERT INTO `bank_payments` (`id`, `status`, `account_info`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank Name: Your bank name\r\nAccount Number:  Your bank account number\r\nRouting Number: Your bank routing number\r\nBranch: Your bank branch name', 'uploads/website-images/bank-2022-09-25-10-06-03-8346.jpg', NULL, '2022-09-25 04:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `title`, `description`, `link`, `image`, `button_text`, `banner_location`, `status`, `header`, `created_at`, `updated_at`) VALUES
(1, 'Up To - 35% Off', 'Hot Deals', 'product', 'uploads/website-images/Mega-menu-2022-02-13-07-53-14-1062.png', 'Shop Now', 'Mega Menu Banner', 1, NULL, NULL, '2022-02-13 13:53:14'),
(2, 'Up To -20% Off', 'Hot Deals', 'product', 'uploads/website-images/banner--2022-02-10-10-24-47-2663.jpg', 'Shop Now', 'Home Page One Column Banner', 1, NULL, NULL, '2022-02-13 13:45:52'),
(3, 'Up To -35% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-03-42-16-1335.png', 'Shop Now', 'Home Page First Two Column Banner One', 1, NULL, NULL, '2022-02-13 13:46:01'),
(4, 'Up To -40% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-03-42-16-1434.png', 'Shop Now', 'Home Page First Two Column Banner Two', 1, NULL, NULL, '2022-02-13 13:46:01'),
(5, 'Up To -28% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-04-18-01-2862.jpg', 'Shop Now', 'Home Page Second Two Column Banner one', 1, NULL, NULL, '2022-02-13 13:46:15'),
(6, 'Up To -22% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-04-18-01-6995.jpg', 'Shop Now', 'Home Page Second Two Column Banner two', 1, NULL, NULL, '2022-02-13 13:46:15'),
(7, 'Up To -35% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-13-04-57-46-4114.jpg', 'Shop Now', 'Home Page Third Two Column Banner one', 1, NULL, NULL, '2022-02-13 13:46:27'),
(8, 'Up To -15% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-13-04-58-43-7437.jpg', 'Shop Now', 'Home Page Third Two Column Banner Two', 1, NULL, NULL, '2022-02-13 13:46:27'),
(9, 'This is Tittle', 'This is Description', 'product', 'uploads/website-images/banner-2022-02-06-04-24-44-6895.jpg', 'dd', 'Shopping cart bottom', 1, '', NULL, '2022-02-13 13:47:23'),
(10, 'This is Title', 'This is Description', 'product', 'uploads/website-images/banner-2022-02-06-04-25-59-9719.jpg', NULL, 'Shopping cart bottom', 0, NULL, NULL, '2022-02-13 13:47:23'),
(11, 'This is Tittle', 'This is Description', 'product', 'uploads/website-images/banner-2022-02-06-04-26-46-8505.jpg', 'dd', 'Campaign page', 1, '', NULL, '2022-02-13 13:47:31'),
(12, 'This is Tittle', 'This is Description', 'product', 'uploads/website-images/banner-2022-01-30-06-21-06-4562.png', 'dd', 'Campaign page', 0, '', NULL, '2022-02-13 13:47:31'),
(13, 'This is Tittle', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Shop Now', 'uploads/website-images/banner-2022-02-07-10-48-37-9226.jpg', 'dd', 'Login page', 0, 'Our Achievement', NULL, '2022-02-07 04:48:39'),
(14, 'Black Friday Sale', 'Up To -70% Off', 'product', 'uploads/website-images/banner-2022-02-06-04-24-02-9777.jpg', NULL, 'Product Detail', 1, NULL, NULL, '2022-02-13 13:46:54'),
(15, 'Default Profile Image', NULL, NULL, 'uploads/website-images/default-avatar-2022-02-07-10-10-46-1477.jpg', NULL, 'Default Profile Image', 0, NULL, NULL, '2022-02-07 04:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `show_homepage` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `admin_id`, `title`, `slug`, `blog_category_id`, `image`, `description`, `short_description`, `views`, `seo_title`, `seo_description`, `status`, `show_homepage`, `created_at`, `updated_at`) VALUES
(1, 1, 'How to generate user friendly seo keyword', 'how-to-generate-user-friendly-seo-keyword', 1, 'uploads/custom-images/blog--2023-02-14-12-14-49-1956.png', '<p>In vim natum soleat nostro, pri in eloquentiam contentiones. Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>\r\n<p>Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.</p>\r\n<p>Sint dignissim consectetuer nec et, per ad probatus referrentur, vel cu consequat sententiae. Ad duis fugit dictas mea, et cum stet oratio cetero. Ne pri omittam fastidii. No per harum dicant neglegentur, sea ei esse volumus adolescens. Nulla argumentum at pri, vel apeirian principes in. An dicam dicant consul mea, ne per option appetere argumentum, vim legere senserit et.</p>\r\n<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>\r\n<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no. Consetetur definitionem cu mea, usu legere minimum ne.&nbsp;</p>\r\n<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>', 'Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.', 0, 'How to generate user friendly seo keyword', 'How to generate user friendly seo keyword', 1, 0, '2023-02-14 06:14:49', '2023-02-18 04:08:14'),
(2, 1, 'How to create a cover letter using open ai', 'how-to-create-a-cover-letter-using-open-ai', 1, 'uploads/custom-images/blog--2023-02-14-12-22-31-2668.png', '<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>\r\n<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>\r\n<p>Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.</p>', 'Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.', 0, 'How to create a cover letter using open ai', 'How to create a cover letter using open ai', 1, 0, '2023-02-14 06:22:31', '2023-02-18 04:07:38'),
(3, 1, 'How to get business idea from chat gpt', 'how-to-get-business-idea-from-chat-gpt', 5, 'uploads/custom-images/blog--2023-02-18-09-57-09-7452.jpg', '<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>\r\n<p>Appetere fabellas ius te. Nonumes splendide deseruisse ea vis, alii velit vel eu. Eos ut scaevola platonem rationibus. Vis natum vivendo sententiae in, ea aperiam apeirian pri, in partem eleifend quo. Pro ex nobis utinam, nam et vidit numquam fastidii, ne per munere adolescens.</p>\r\n<p>Sit vivendum eleifend adipiscing ea. Modus legere suscipiantur an vel, melius patrioque est cu, eum at audire probatus repudiandae. Ei tempor definitiones eam, sea dico omnium ne. Eam ad ubique tincidunt elaboraret, malis aperiri sit et. Ut quo vero inimicus. Sed at munere fuisset noluisse, eleifend senserit an vix.</p>\r\n<p>Te soleat legendos molestiae cum. Tale sanctus invidunt cu per, quo at modo recteque elaboraret. Ex mazim homero per. Eu nec exerci doctus, cu mei oblique copiosae. Consul diceret usu ne.</p>', 'Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.', 0, 'How to get business idea from chat gpt', 'How to get business idea from chat gpt', 1, 1, '2023-02-18 03:57:10', '2023-02-18 03:57:54'),
(4, 1, 'How to find best solution about your coding error', 'how-to-find-best-solution-about-your-coding-error', 5, 'uploads/custom-images/blog--2023-02-18-09-59-51-8933.jpg', '<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>\r\n<p>Appetere fabellas ius te. Nonumes splendide deseruisse ea vis, alii velit vel eu. Eos ut scaevola platonem rationibus. Vis natum vivendo sententiae in, ea aperiam apeirian pri, in partem eleifend quo. Pro ex nobis utinam, nam et vidit numquam fastidii, ne per munere adolescens.</p>\r\n<p>Sit vivendum eleifend adipiscing ea. Modus legere suscipiantur an vel, melius patrioque est cu, eum at audire probatus repudiandae. Ei tempor definitiones eam, sea dico omnium ne. Eam ad ubique tincidunt elaboraret, malis aperiri sit et. Ut quo vero inimicus. Sed at munere fuisset noluisse, eleifend senserit an vix.</p>\r\n<p>Te soleat legendos molestiae cum. Tale sanctus invidunt cu per, quo at modo recteque elaboraret. Ex mazim homero per. Eu nec exerci doctus, cu mei oblique copiosae. Consul diceret usu ne.</p>', 'Appetere fabellas ius te. Nonumes splendide deseruisse ea vis, alii velit vel eu. Eos ut scaevola platonem rationibus. Vis natum vivendo sententiae in, ea aperiam apeirian pri, in partem eleifend quo.', 0, 'How to find best solution about your coding error', 'How to find best solution about your coding error', 1, 1, '2023-02-18 03:59:51', '2023-02-18 04:08:02'),
(5, 1, 'How to make your social media ads for product', 'how-to-make-your-social-media-ads-for-product', 3, 'uploads/custom-images/blog--2023-02-18-10-02-19-1251.jpg', '<p>Per ex vero nonumy. Ius eu doming nominavi mediocrem, aliquid efficiantur no vim, sanctus admodum mnesarchum ad pro. No sea invidunt partiendo. No postea numquam ocurreret duo, unum abhorreant cu nam, fugit fastidii percipitur nam id.</p>\r\n<p>Sint dignissim consectetuer nec et, per ad probatus referrentur, vel cu consequat sententiae. Ad duis fugit dictas mea, et cum stet oratio cetero. Ne pri omittam fastidii. No per harum dicant neglegentur, sea ei esse volumus adolescens. Nulla argumentum at pri, vel apeirian principes in. An dicam dicant consul mea, ne per option appetere argumentum, vim legere senserit et.</p>\r\n<p>Usu ad solet diceret, usu at appetere percipit appellantur, te est primis audire gloriatur. Scripta noluisse no mel, vis ne decore ridens labitur. Stet erant saepe eu mea. An mel dolore salutandi abhorreant. An quo aliquip maluisset, mea quaeque indoctum in, pro augue veritus praesent te.</p>\r\n<p>Vim et alterum ornatus vivendum, ut mea solum repudiare. His etiam delenit tibique no, ad harum omnes scribentur qui, ne wisi detracto his. Ei movet accusam pri. Ex vel diam quas urbanitas, ne has velit affert habemus. At quis nonumy disputando nec, falli scaevola vel ea. Omittantur concludaturque nam eu, ex est vocent virtute.</p>\r\n<p>Sit vivendum eleifend adipiscing ea. Modus legere suscipiantur an vel, melius patrioque est cu, eum at audire probatus repudiandae. Ei tempor definitiones eam, sea dico omnium ne. Eam ad ubique tincidunt elaboraret, malis aperiri sit et. Ut quo vero inimicus. Sed at munere fuisset noluisse, eleifend senserit an vix.</p>\r\n<p>Ipsum volumus pertinax mea ut, eu erat tacimates nam. Tibique copiosae verterem mea no, eam ex melius option, soluta timeam et his. Sit simul gubergren reformidans id, amet minimum nominavi eos ea. Et augue dicta vix. Mea ne utamur referrentur.</p>\r\n<p>Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.</p>', 'Ipsum volumus pertinax mea ut, eu erat tacimates nam. Tibique copiosae verterem mea no, eam ex melius option, soluta timeam et his. Sit simul gubergren reformidans id, amet minimum nominavi eos ea. Et augue dicta vix. Mea ne utamur referrentu', 0, 'How to make your social media ads for ecommerce product', 'How to make your social media ads for ecommerce product', 1, 0, '2023-02-18 04:02:19', '2023-02-18 04:06:57'),
(6, 1, 'How to write product description for your product', 'how-to-write-product-description-for-your-product', 3, 'uploads/custom-images/blog--2023-02-18-10-06-46-2456.jpg', '<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>\r\n<p>In vim natum soleat nostro, pri in eloquentiam contentiones. Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>', 'Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.', 0, 'How to write product description for your product', 'How to write product description for your product', 1, 1, '2023-02-18 04:06:46', '2023-02-20 06:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Open AI', 'open-ai', 1, '2023-02-14 06:14:26', '2023-02-18 03:50:42'),
(2, 'Web Development', 'web-development', 1, '2023-02-18 03:51:02', '2023-02-18 03:51:02'),
(3, 'Web Design', 'web-design', 1, '2023-02-18 03:51:08', '2023-02-18 03:51:08'),
(4, 'UX Design', 'ux-design', 1, '2023-02-18 03:51:20', '2023-02-18 03:51:20'),
(5, 'ChatGPT', 'chatgpt', 1, '2023-02-18 03:51:32', '2023-02-18 03:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 'David Richard', 'david@gmail.com', 'Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret', 1, '2023-02-18 03:48:48', '2023-02-18 03:48:54'),
(5, 2, 'John Doe', 'user@gmail.com', 'In vim natum soleat nostro, pri in eloquentiam contentiones. Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est', 1, '2023-02-18 03:49:49', '2023-02-18 03:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `breadcrumb_images`
--

CREATE TABLE `breadcrumb_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foreground_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breadcrumb_images`
--

INSERT INTO `breadcrumb_images` (`id`, `location`, `foreground_image`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Blog Page', 'uploads/website-images/banner-us-2023-02-14-01-43-34-6280.png', 'uploads/website-images/banner-us-2023-02-14-01-43-59-8887.jpg', NULL, '2023-02-14 07:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'John Doe', 'user@gmail.com', '123-343-4444', 'Subscribe Verification', 'Feel Free to Get in Touch', '2022-12-21 03:20:18', '2022-12-21 03:20:18'),
(3, 'John Doe', 'user@gmail.com', '123-343-4444', 'Subscribe Verification', 'Feel Free to Get in Touch', '2022-12-21 03:24:38', '2022-12-21 03:24:38'),
(4, 'John Doe', 'agent@gmail.com', '123-343-4444', 'Subscribe Verification', 'Fill the form now & Request an Estimate', '2022-12-21 03:25:12', '2022-12-21 03:25:12'),
(6, 'John Doe', 'user@gmail.com', '123-343-4444', 'Subscribe Verification', 'Do you have any question ?\r\nFill the form now &amp; Request an Estimate', '2023-01-15 05:24:20', '2023-01-15 05:24:20'),
(7, 'John Doe', 'user@gmail.com', '123-343-4444', 'If You Any Question In Your Mind Please Place Here.', 'If You Any Question In Your Mind Please Place Here.', '2023-02-14 09:47:11', '2023-02-14 09:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact_pages`
--

CREATE TABLE `contact_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supporter_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_pages`
--

INSERT INTO `contact_pages` (`id`, `supporter_image`, `title`, `description`, `email`, `address`, `phone`, `map`, `created_at`, `updated_at`) VALUES
(1, 'uploads/website-images/supporter--2022-08-28-02-04-43-1575.jpg', 'Contact Information', 'Fill the form below or write us .We will try our to help you as soon as possible.', 'websolutionus1@gmail.com\r\nwebsolutionus@gmail.com', '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States', '+1347-430-9510\r\n+4247-100-9510', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.681138843672!2d-73.89482218459395!3d40.747041279328165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f01328248b3%3A0x62300784dd275f96!2s7232%20Broadway%20%23%20308%2C%20Flushing%2C%20NY%2011372%2C%20USA!5e0!3m2!1sen!2sbd!4v1652467683397!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2022-01-30 12:31:58', '2023-01-22 09:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `cookie_consents`
--

CREATE TABLE `cookie_consents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `border` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corners` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cookie_consents`
--

INSERT INTO `cookie_consents` (`id`, `status`, `border`, `corners`, `background_color`, `text_color`, `border_color`, `btn_bg_color`, `btn_text_color`, `message`, `link_text`, `btn_text`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'thin', 'normal', '#184dec', '#fafafa', '#0a58d6', '#fffceb', '#222758', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took.', 'More Info', 'Yes', NULL, NULL, '2022-02-13 08:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AFA', 'Afghan Afghani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ALL', 'Albanian Lek', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'DZD', 'Algerian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'AOA', 'Angolan Kwanza', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'ARS', 'Argentine Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'AMD', 'Armenian Dram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'AWG', 'Aruban Florin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'AUD', 'Australian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'AZN', 'Azerbaijani Manat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'BSD', 'Bahamian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'BHD', 'Bahraini Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'BDT', 'Bangladeshi Taka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'BBD', 'Barbadian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'BYR', 'Belarusian Ruble', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'BEF', 'Belgian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'BZD', 'Belize Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'BMD', 'Bermudan Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'BTN', 'Bhutanese Ngultrum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'BTC', 'Bitcoin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'BOB', 'Bolivian Boliviano', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'BAM', 'Bosnia-Herzegovina Convertible Mark', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'BWP', 'Botswanan Pula', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'BRL', 'Brazilian Real', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'GBP', 'British Pound Sterling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'BND', 'Brunei Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'BGN', 'Bulgarian Lev', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'BIF', 'Burundian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'KHR', 'Cambodian Riel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'CAD', 'Canadian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'CVE', 'Cape Verdean Escudo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'KYD', 'Cayman Islands Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'XOF', 'CFA Franc BCEAO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'XAF', 'CFA Franc BEAC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'XPF', 'CFP Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'CLP', 'Chilean Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'CNY', 'Chinese Yuan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'COP', 'Colombian Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'KMF', 'Comorian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'CDF', 'Congolese Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'CRC', 'Costa Rican ColÃ³n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'HRK', 'Croatian Kuna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'CUC', 'Cuban Convertible Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'CZK', 'Czech Republic Koruna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'DKK', 'Danish Krone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'DJF', 'Djiboutian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'DOP', 'Dominican Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'XCD', 'East Caribbean Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'EGP', 'Egyptian Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'ERN', 'Eritrean Nakfa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'EEK', 'Estonian Kroon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'ETB', 'Ethiopian Birr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'EUR', 'Euro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'FKP', 'Falkland Islands Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'FJD', 'Fijian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'GMD', 'Gambian Dalasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'GEL', 'Georgian Lari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'DEM', 'German Mark', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'GHS', 'Ghanaian Cedi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'GIP', 'Gibraltar Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'GRD', 'Greek Drachma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'GTQ', 'Guatemalan Quetzal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'GNF', 'Guinean Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'GYD', 'Guyanaese Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'HTG', 'Haitian Gourde', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'HNL', 'Honduran Lempira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'HKD', 'Hong Kong Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'HUF', 'Hungarian Forint', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'ISK', 'Icelandic KrÃ³na', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'INR', 'Indian Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'IDR', 'Indonesian Rupiah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'IRR', 'Iranian Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'IQD', 'Iraqi Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'ILS', 'Israeli New Sheqel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'ITL', 'Italian Lira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'JMD', 'Jamaican Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'JPY', 'Japanese Yen', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'JOD', 'Jordanian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'KZT', 'Kazakhstani Tenge', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'KES', 'Kenyan Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'KWD', 'Kuwaiti Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'KGS', 'Kyrgystani Som', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'LAK', 'Laotian Kip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'LVL', 'Latvian Lats', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'LBP', 'Lebanese Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'LSL', 'Lesotho Loti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'LRD', 'Liberian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'LYD', 'Libyan Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'LTL', 'Lithuanian Litas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'MOP', 'Macanese Pataca', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'MKD', 'Macedonian Denar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'MGA', 'Malagasy Ariary', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'MWK', 'Malawian Kwacha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'MYR', 'Malaysian Ringgit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'MVR', 'Maldivian Rufiyaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'MRO', 'Mauritanian Ouguiya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'MUR', 'Mauritian Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'MXN', 'Mexican Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'MDL', 'Moldovan Leu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'MNT', 'Mongolian Tugrik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'MAD', 'Moroccan Dirham', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'MZM', 'Mozambican Metical', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'MMK', 'Myanmar Kyat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'NAD', 'Namibian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'NPR', 'Nepalese Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'ANG', 'Netherlands Antillean Guilder', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'TWD', 'New Taiwan Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'NZD', 'New Zealand Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'NIO', 'Nicaraguan CÃ³rdoba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'NGN', 'Nigerian Naira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'KPW', 'North Korean Won', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'NOK', 'Norwegian Krone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'OMR', 'Omani Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'PKR', 'Pakistani Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'PAB', 'Panamanian Balboa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'PGK', 'Papua New Guinean Kina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'PYG', 'Paraguayan Guarani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'PEN', 'Peruvian Nuevo Sol', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'PHP', 'Philippine Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'PLN', 'Polish Zloty', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'QAR', 'Qatari Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'RON', 'Romanian Leu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'RUB', 'Russian Ruble', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'RWF', 'Rwandan Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'SVC', 'Salvadoran ColÃ³n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'WST', 'Samoan Tala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'SAR', 'Saudi Riyal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'RSD', 'Serbian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'SCR', 'Seychellois Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'SLL', 'Sierra Leonean Leone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'SGD', 'Singapore Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'SKK', 'Slovak Koruna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'SBD', 'Solomon Islands Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'SOS', 'Somali Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'ZAR', 'South African Rand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'KRW', 'South Korean Won', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'XDR', 'Special Drawing Rights', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'LKR', 'Sri Lankan Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'SHP', 'St. Helena Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'SDG', 'Sudanese Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'SRD', 'Surinamese Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'SZL', 'Swazi Lilangeni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'SEK', 'Swedish Krona', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'CHF', 'Swiss Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'SYP', 'Syrian Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'STD', 'São Tomé and Príncipe Dobra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'TJS', 'Tajikistani Somoni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'TZS', 'Tanzanian Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'THB', 'Thai Baht', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'TOP', 'Tongan pa\'anga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'TTD', 'Trinidad & Tobago Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'TND', 'Tunisian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'TRY', 'Turkish Lira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'TMT', 'Turkmenistani Manat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'UGX', 'Ugandan Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'UAH', 'Ukrainian Hryvnia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'AED', 'United Arab Emirates Dirham', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'UYU', 'Uruguayan Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'USD', 'US Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'UZS', 'Uzbekistan Som', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'VUV', 'Vanuatu Vatu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'VEF', 'Venezuelan BolÃ­var', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'VND', 'Vietnamese Dong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'YER', 'Yemeni Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'ZMK', 'Zambian Kwacha', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currency_countries`
--

CREATE TABLE `currency_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `code` varchar(2) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `currency_countries`
--

INSERT INTO `currency_countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Afghanistan', 'AF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Åland Islands', 'AX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Albania', 'AL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Algeria', 'DZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'American Samoa', 'AS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Angola', 'AO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Anguilla', 'AI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Antarctica', 'AQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Antigua and Barbuda', 'AG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Argentina', 'AR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Armenia', 'AM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Aruba', 'AW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Australia', 'AU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Austria', 'AT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Azerbaijan', 'AZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Bahamas', 'BS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Bahrain', 'BH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Bangladesh', 'BD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Barbados', 'BB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Belarus', 'BY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Belgium', 'BE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Belize', 'BZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Benin', 'BJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Bermuda', 'BM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Bhutan', 'BT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Bolivia (Plurinational State of)', 'BO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Bosnia and Herzegovina', 'BA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Botswana', 'BW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Bouvet Island', 'BV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Brazil', 'BR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'British Indian Ocean Territory', 'IO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Brunei Darussalam', 'BN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Bulgaria', 'BG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Burkina Faso', 'BF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Burundi', 'BI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Cabo Verde', 'CV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Cambodia', 'KH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Cameroon', 'CM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Canada', 'CA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Cayman Islands', 'KY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Central African Republic', 'CF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Chad', 'TD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Chile', 'CL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'China', 'CN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Christmas Island', 'CX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Cocos (Keeling) Islands', 'CC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Colombia', 'CO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Comoros', 'KM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Congo', 'CG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Congo (Democratic Republic of the)', 'CD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Cook Islands', 'CK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Costa Rica', 'CR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Côte d\'Ivoire', 'CI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Croatia', 'HR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Cuba', 'CU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Curaçao', 'CW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Cyprus', 'CY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Czech Republic', 'CZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Denmark', 'DK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Djibouti', 'DJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Dominica', 'DM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Dominican Republic', 'DO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Ecuador', 'EC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Egypt', 'EG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'El Salvador', 'SV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Equatorial Guinea', 'GQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Eritrea', 'ER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Estonia', 'EE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Ethiopia', 'ET', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Falkland Islands (Malvinas)', 'FK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Faroe Islands', 'FO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Fiji', 'FJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Finland', 'FI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'France', 'FR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'French Guiana', 'GF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'French Polynesia', 'PF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'French Southern Territories', 'TF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Gabon', 'GA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'Gambia', 'GM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Georgia', 'GE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Germany', 'DE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Ghana', 'GH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Gibraltar', 'GI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Greece', 'GR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Greenland', 'GL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Grenada', 'GD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Guadeloupe', 'GP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Guam', 'GU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Guatemala', 'GT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Guernsey', 'GG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Guinea', 'GN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Guinea-Bissau', 'GW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Guyana', 'GY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Haiti', 'HT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Heard Island and McDonald Islands', 'HM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Holy See', 'VA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Honduras', 'HN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Hong Kong', 'HK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Hungary', 'HU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Iceland', 'IS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'India', 'IN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Indonesia', 'ID', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Iran (Islamic Republic of)', 'IR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Iraq', 'IQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Ireland', 'IE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Isle of Man', 'IM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Israel', 'IL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Italy', 'IT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Jamaica', 'JM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Japan', 'JP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Jersey', 'JE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Jordan', 'JO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Kazakhstan', 'KZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Kenya', 'KE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Kiribati', 'KI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Korea (Democratic People\'s Republic of)', 'KP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Korea (Republic of)', 'KR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Kuwait', 'KW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Kyrgyzstan', 'KG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Lao People\'s Democratic Republic', 'LA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Latvia', 'LV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Lebanon', 'LB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Lesotho', 'LS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Liberia', 'LR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Libya', 'LY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Liechtenstein', 'LI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Lithuania', 'LT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Luxembourg', 'LU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Macao', 'MO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'Macedonia (the former Yugoslav Republic of)', 'MK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Madagascar', 'MG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Malawi', 'MW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'Malaysia', 'MY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Maldives', 'MV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Mali', 'ML', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Malta', 'MT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Marshall Islands', 'MH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Martinique', 'MQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Mauritania', 'MR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Mauritius', 'MU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Mayotte', 'YT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Mexico', 'MX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Micronesia (Federated States of)', 'FM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Moldova (Republic of)', 'MD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Monaco', 'MC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Mongolia', 'MN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Montenegro', 'ME', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Montserrat', 'MS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Morocco', 'MA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Mozambique', 'MZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Myanmar', 'MM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Namibia', 'NA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Nauru', 'NR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Nepal', 'NP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Netherlands', 'NL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'New Caledonia', 'NC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'New Zealand', 'NZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Nicaragua', 'NI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Niger', 'NE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Nigeria', 'NG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Niue', 'NU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Norfolk Island', 'NF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Northern Mariana Islands', 'MP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Norway', 'NO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'Oman', 'OM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'Pakistan', 'PK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Palau', 'PW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Palestine, State of', 'PS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Panama', 'PA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Papua New Guinea', 'PG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Paraguay', 'PY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Peru', 'PE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Philippines', 'PH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Pitcairn', 'PN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Poland', 'PL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Portugal', 'PT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Puerto Rico', 'PR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Qatar', 'QA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Réunion', 'RE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Romania', 'RO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Russian Federation', 'RU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Rwanda', 'RW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Saint Barthélemy', 'BL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Saint Kitts and Nevis', 'KN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Saint Lucia', 'LC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Saint Martin (French part)', 'MF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Saint Pierre and Miquelon', 'PM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Saint Vincent and the Grenadines', 'VC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Samoa', 'WS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'San Marino', 'SM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Sao Tome and Principe', 'ST', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Saudi Arabia', 'SA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Senegal', 'SN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Serbia', 'RS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Seychelles', 'SC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Sierra Leone', 'SL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Singapore', 'SG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Sint Maarten (Dutch part)', 'SX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Slovakia', 'SK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'Slovenia', 'SI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Solomon Islands', 'SB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Somalia', 'SO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'South Africa', 'ZA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'South Georgia and the South Sandwich Islands', 'GS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'South Sudan', 'SS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Spain', 'ES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Sri Lanka', 'LK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Sudan', 'SD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Suriname', 'SR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Svalbard and Jan Mayen', 'SJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Swaziland', 'SZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'Sweden', 'SE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Switzerland', 'CH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Syrian Arab Republic', 'SY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Taiwan, Province of China', 'TW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Tajikistan', 'TJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Tanzania, United Republic of', 'TZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Thailand', 'TH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Timor-Leste', 'TL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Togo', 'TG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Tokelau', 'TK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Tonga', 'TO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Trinidad and Tobago', 'TT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Tunisia', 'TN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Turkey', 'TR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Turkmenistan', 'TM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Turks and Caicos Islands', 'TC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Tuvalu', 'TV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Uganda', 'UG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Ukraine', 'UA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'United Arab Emirates', 'AE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'United Kingdom of Great Britain and Northern Ireland', 'GB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'United States Minor Outlying Islands', 'UM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'United States of America', 'US', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Uruguay', 'UY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Uzbekistan', 'UZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Vanuatu', 'VU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Venezuela (Bolivarian Republic of)', 'VE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Viet Nam', 'VN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Virgin Islands (British)', 'VG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Virgin Islands (U.S.)', 'VI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Wallis and Futuna', 'WF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Western Sahara', 'EH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Yemen', 'YE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Zambia', 'ZM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Zimbabwe', 'ZW', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `page_name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Custom Page One', 'custom-page-one', '<p>1. What is custom page?</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p><p>2. How does work custom page</p>\r\n\r\n<p>While it’s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p><p>Features :</p>\r\n\r\n<ul><li>Slim body with metal cover</li><li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li><li>8GB DDR4 RAM and fast 512GB PCIe SSD</li><li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li></ul><p>3. Protect Your Property</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p><p>4. What to Include in Terms and Conditions for Online Stores</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas  Ipsum to make a type specimen book.</p><p>05.Pricing and Payment Terms</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.<br></p>', 1, '2022-09-29 04:30:53', '2023-01-15 03:54:57'),
(2, 'Custom Page Two', 'custom-page-two', '<h3>1. What is custom page?</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p><h3>2. How does work custom page</h3><p>While it’s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p><p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p><h3>Features :</h3><ul><li>Slim body with metal cover</li><li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li><li>8GB DDR4 RAM and fast 512GB PCIe SSD</li><li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li></ul><h3>3. Protect Your Property</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p><h3>4. What to Include in Terms and Conditions for Online Stores</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p><p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p><h3>05.Pricing and Payment Terms</h3><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p><p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p><p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.<br></p>', 1, '2022-09-29 06:17:38', '2022-12-03 10:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `custom_paginations`
--

CREATE TABLE `custom_paginations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_paginations`
--

INSERT INTO `custom_paginations` (`id`, `page_name`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Blog Page', 6, NULL, '2022-02-07 08:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

CREATE TABLE `email_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_type` tinyint(4) DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_configurations`
--

INSERT INTO `email_configurations` (`id`, `mail_type`, `mail_host`, `mail_port`, `email`, `email_password`, `smtp_username`, `smtp_password`, `mail_encryption`, `created_at`, `updated_at`) VALUES
(1, 2, 'smtp.mailtrap.io', '587', 'maryleynda12@gmail.com', 'mary+pass@', '045ae65cc34b16', '48889ee7937b65', 'tls', NULL, '2022-07-03 14:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Password Reset', 'Password Reset', '<h4>Dear <b>{{name}}</b>,</h4>\r\n    <p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>', NULL, '2021-12-09 10:06:57'),
(2, 'Contact Email', 'Contact Email', '<p>Name: <b>{{name}}</b></p><p>\r\n\r\nEmail: <b>{{email}}</b></p><p>\r\n\r\nPhone: <b>{{phone}}</b></p><p><span style=\"background-color: transparent;\">Subject: <b>{{subject}}</b></span></p><p>\r\n\r\nMessage: <b>{{message}}</b></p>', NULL, '2021-12-10 23:44:34'),
(3, 'Subscribe Notification', 'Subscribe Notification', '<h2><b>Hi there</b>,</h2><p>\r\nCongratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you won\'t approve this link, after 24hourse your subscription will be denay</p>', NULL, '2021-12-10 23:44:53'),
(4, 'User Verification', 'User Verification', '<p>Dear <b>{{user_name}}</b>,\r\n</p><p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p>', NULL, '2021-12-10 23:45:25'),
(6, 'Order Successfully', 'Order Successfully', '<p>Hi {{user_name}},</p><p> \r\nThanks for your new purchased. You have successfully enrolled the package .</p><p>Total Amount : {{total_amount}},</p><p>Payment Method : {{payment_method}},</p><p>Payment Status : {{payment_status}},</p>', NULL, '2022-01-10 21:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `error_pages`
--

CREATE TABLE `error_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `error_pages`
--

INSERT INTO `error_pages` (`id`, `image`, `title`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 'uploads/website-images/error-page--2023-02-18-11-07-11-8135.png', 'Sorry, the page you were looking for could not be found.', 'Go to Home', NULL, '2023-02-18 05:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_comments`
--

CREATE TABLE `facebook_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_comments`
--

INSERT INTO `facebook_comments` (`id`, `app_id`, `comment_type`, `created_at`, `updated_at`) VALUES
(1, '882238482112522', 1, NULL, '2022-10-08 07:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_pixels`
--

CREATE TABLE `facebook_pixels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_pixels`
--

INSERT INTO `facebook_pixels` (`id`, `status`, `app_id`, `created_at`, `updated_at`) VALUES
(1, 1, '972911606915059', NULL, '2021-12-13 22:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What does WebSolutionUs do?', '<p>WebSolutionUs provides the best web solutions (web design, web development, search engine optimization, etc.) for international clients.</p>', 1, '2022-09-29 06:04:11', '2022-09-29 06:04:11'),
(2, 'Do you have an affiliate program?', '<p>We are currently working on our affiliate program setup. Soon it will be released to the public.&nbsp;<br></p>', 1, '2022-09-29 06:05:19', '2022-09-29 06:05:19'),
(3, 'Will I get the complete source code?', '<p>Yes, our source codes are open. If you purchase our product, you will get the complete source code.&nbsp;<br></p>', 1, '2022-09-29 06:05:41', '2022-09-29 06:05:41'),
(4, 'Do you provide customization service?', '<p>Yes, we provide the customization service for a small amount of fee. But it depends. If we become busy with projects, we do not take any custom orders.&nbsp;<br></p>', 1, '2022-09-29 06:06:01', '2022-09-29 06:06:01'),
(5, 'Can I test your product before purchase?', '<p>We currently do not offer this service, but soon we will start this service.<br></p>', 1, '2022-09-29 06:06:23', '2022-09-29 06:06:23'),
(6, 'What do we assist?', '<p>WebSolutionUS is a group of talented application developers that create products for marketplaces like Codecanyon and Themeforest. WebSolutionUS also creates customized websites, software, and applications for a variety of clients and businesses all around the world. WebSolutionUS offers exceptional assistance to ensure a successful business platform. We are envato marketplace approved and provide direct sales also.<br></p>', 1, '2022-09-29 06:06:53', '2022-09-29 06:06:53'),
(7, 'Can I avail the maintenance support for my clients?', '<p>Yes, you may design websites for your clients using our services, including scripting and themes. We like providing attractive and practical design ideas for clients.<br></p>', 1, '2022-09-29 06:07:15', '2022-09-29 06:07:15'),
(8, 'What is the refund policy detail?', '<p>Because you are using the best digital product and service, most of the time &nbsp; refunds will not be necessary, and because no returns will be given for digital items unless the product you bought is probably unnecessary, and you submitted a support request but had no response within one business day, and the product\'s primary statement was completely false. For additional information, please see our Refund Policy.<br></p>', 1, '2022-09-29 06:08:08', '2022-09-29 06:08:08'),
(9, 'How long will I get the service support?', '<p>At the end of the service session, are you puzzled? Okay, you may pay a little amount to renew support at any moment. In the vast majority of circumstances, it is not necessary. We like assisting our customers.<br></p>', 1, '2022-09-29 06:09:10', '2022-09-29 06:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `flutterwaves`
--

CREATE TABLE `flutterwaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double NOT NULL DEFAULT 1,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flutterwaves`
--

INSERT INTO `flutterwaves` (`id`, `public_key`, `secret_key`, `currency_rate`, `country_code`, `currency_code`, `title`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FLWPUBK_TEST-5760e3ff9888aa1ab5e5cd1ec3f99cb1-X', 'FLWSECK_TEST-81cb5da016d0a51f7329d4a8057e766d-X', 417.35, 'NG', 'NGN', 'Ecommerce', 'uploads/website-images/flutterwave-2022-09-25-09-48-17-9566.jpg', 1, NULL, '2022-09-25 03:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `phone`, `email`, `address`, `about_us`, `first_column`, `second_column`, `third_column`, `copyright`, `payment_image`, `created_at`, `updated_at`) VALUES
(1, '+1347-430-9510', 'websolutionus1@gmail.com', '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States', 'We are dedicated to work with all dynamic features like Laravel, customized website, PHP, SEO, etc.', 'Important Link', 'Quick Link', 'Our Service', 'Copyright 2023, Websolutionus. All Rights Reserved.', 'uploads/website-images/payment-card-2023-02-14-04-30-48-3070.png', NULL, '2023-02-18 04:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `column`, `link`, `title`, `created_at`, `updated_at`) VALUES
(1, '1', 'contact-us', 'Contact Us', '2022-09-29 07:16:42', '2022-09-29 07:16:42'),
(2, '1', 'blogs', 'Our Blog', '2022-09-29 07:17:20', '2022-09-29 07:17:20'),
(3, '1', 'faq', 'FAQ', '2022-09-29 07:18:28', '2022-09-29 07:18:28'),
(4, '1', 'terms-and-conditions', 'Terms and Conditions', '2022-09-29 07:18:45', '2022-09-29 07:18:45'),
(5, '1', 'privacy-policy', 'Privacy Policy', '2022-09-29 07:19:13', '2022-09-29 07:19:13'),
(6, '2', 'services', 'Our Services', '2022-09-29 07:20:17', '2022-09-29 07:20:17'),
(7, '2', 'about-us', 'Why Choose Us', '2022-09-29 07:20:35', '2022-09-29 07:20:35'),
(8, '2', 'dashboard', 'My Profile', '2022-09-29 07:21:12', '2022-09-29 07:21:12'),
(9, '2', 'about-us', 'About Us', '2022-09-29 07:21:39', '2022-09-29 07:21:39'),
(10, '2', 'join-as-a-provider', 'Join as a Provider', '2022-09-29 07:22:37', '2022-09-29 07:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `footer_social_links`
--

CREATE TABLE `footer_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_social_links`
--

INSERT INTO `footer_social_links` (`id`, `link`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'fa fa-facebook', '2022-09-29 07:14:50', '2023-01-15 09:22:49'),
(2, 'https://www.twitter.com/', 'fab fa-twitter', '2022-09-29 07:15:06', '2022-09-29 07:15:06'),
(3, 'https://www.instagram.com/', 'fab fa-instagram', '2022-09-29 07:15:27', '2022-09-29 07:15:27'),
(4, 'https://www.linkedin.com/', 'fa fa-linkedin', '2022-09-29 07:15:44', '2023-01-15 09:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `google_analytics`
--

CREATE TABLE `google_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `analytic_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_analytics`
--

INSERT INTO `google_analytics` (`id`, `analytic_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UA-84213520-6', 1, NULL, '2021-12-10 22:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `google_recaptchas`
--

CREATE TABLE `google_recaptchas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_recaptchas`
--

INSERT INTO `google_recaptchas` (`id`, `site_key`, `secret_key`, `status`, `created_at`, `updated_at`) VALUES
(1, '6Lc3T2ocAAAAACJ5pz-mzyptRmmw6_aDcfpLzh7X', '6Lc3T2ocAAAAACe4NTKSx2UgeVHB31Xt08C8DzYP', 1, NULL, '2023-02-20 07:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `why_choose_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home1_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item1_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item2_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item3_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item2_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item3_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home1_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home1_foreground1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home1_foreground2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home2_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter1_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter2_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter3_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter2_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter3_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter2_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter3_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_home1_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_home2_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_title3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_play_store_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_apple_store_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home1_foreground` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home2_foreground` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home3_foreground` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home3_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home1_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home2_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `why_choose_title1`, `why_choose_title2`, `why_choose_image1`, `why_choose_image2`, `why_choose_image3`, `why_choose_description`, `why_choose_home1_background`, `why_choose_link`, `why_choose_item1_icon`, `why_choose_item2_icon`, `why_choose_item3_icon`, `why_choose_item1_title`, `why_choose_item2_title`, `why_choose_item3_title`, `why_choose_item1_description`, `why_choose_item2_description`, `why_choose_item3_description`, `offer_title1`, `offer_title2`, `offer_home1_background`, `offer_home1_foreground1`, `offer_home1_foreground2`, `offer_home2_background`, `offer_home3_background`, `offer_link`, `counter1_value`, `counter2_value`, `counter3_value`, `counter1_title`, `counter2_title`, `counter3_title`, `counter1_description`, `counter2_description`, `counter3_description`, `counter_item1_title`, `counter_item1_description`, `counter_item1_link`, `counter_item1_icon`, `counter_item2_title`, `counter_item2_description`, `counter_item2_link`, `counter_item2_icon`, `counter_home1_background`, `counter_home2_background`, `app_title1`, `app_title2`, `app_title3`, `app_description`, `app_play_store_link`, `app_apple_store_link`, `app_home1_foreground`, `app_home2_foreground`, `app_home3_foreground`, `app_home3_background`, `app_home1_background`, `app_home2_background`, `how_it_work_title1`, `how_it_work_title2`, `how_it_work_description`, `how_it_work_link`, `how_it_work_image`, `how_it_work_video_id`, `created_at`, `updated_at`) VALUES
(1, 'Why Choose Us?', 'Get Closer Look How Business Develop In AI Data Analysis.', 'uploads/website-images/why-choose-us-2023-02-20-12-27-01-5399.png', 'uploads/website-images/why-choose-us-2023-02-20-12-27-14-6493.png', 'uploads/website-images/why-choose-us-2023-02-20-12-27-30-2208.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour or randomised', 'uploads/website-images/why-choose-us-2023-02-20-12-26-40-3500.png', 'about-us', 'fas fa-cogs', 'fas fa-pencil-paintbrush', 'fas fa-notes-medical', 'Ipsum Dolor Sit Amet Consectetur.', 'Ipsum Dolor Sit Amet Consectetur.', 'Ipsum Dolor Sit Amet Consectetur.', 'Get more customers on Best Digital Business Card Solution more customers on Best Digital Business Card Solution.', 'Get more customers on Best Digital Business Card Solution more customers on Best Digital Business Card Solution.', 'Get more customers on Best Digital Business Card Solution more customers on Best Digital Business Card Solution.', 'Check our software', 'Megapack worth $565 for Only $39.', 'uploads/website-images/offer--2023-01-22-01-10-10-2984.png', 'uploads/website-images/offer--2023-01-22-01-15-38-9678.png', 'uploads/website-images/offer--2023-01-22-01-16-28-6181.png', 'uploads/website-images/offer--2023-01-22-01-10-18-7594.png', 'uploads/website-images/offer--2023-01-22-01-11-47-6504.png', 'https://websolutionus.com/', '60', '85', '78', 'Premimum Recourses', 'Premimum Recourses', 'Premimum Recourses', 'It is a long established fact that reader late by the reada.', 'It is a long established fact that reader late by the reada.', 'It is a long established fact that reader late by the reada.', 'Speed up Business', 'Purchase one of our digital products from the biggest software directory and boot strap find to the into in a your business spending just bugs.', 'fdsds', 'uploads/website-images/counter--2023-01-22-12-20-12-8534.png', 'Sell Your Goods Here', 'Our long history of ownership has provided find to ahe best inleiment evert to make it best quliss financial reassure,It has also firm continuity.', 'Item_one_link', 'uploads/website-images/counter--2023-01-22-12-24-21-4272.png', 'uploads/website-images/counter--2023-01-22-12-33-34-9569.png', 'uploads/website-images/counter--2023-01-22-12-34-34-9536.png', 'Get Our', 'Mobile App', 'It’s Make easy for your life !', 'Save time with preconfigured environments that alreadyinto into theon the find to find all the prerequisites installed for the news and as you make removes.', 'play_lin', 'app_link', 'uploads/website-images/mobile-app-bg--2023-01-22-10-57-16-6267.png', 'uploads/website-images/mobile-app-bg--2023-01-22-11-03-17-8162.png', 'uploads/website-images/mobile-app-bg--2023-01-22-11-08-08-6616.png', 'uploads/website-images/mobile-app-bg--2023-01-22-11-07-58-2673.png', 'uploads/website-images/mobile-app-bg--2023-01-22-10-55-20-1952.png', 'uploads/website-images/mobile-app-bg--2023-01-22-11-02-25-2308.png', 'How It Works?', 'Best Digital Business Card Solution.', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which</p>\r\n<ul>\r\n<li>Get more customers on Best Digital Business Card Solution.</li>\r\n<li>There are many variations of passages of Lorem Ipsum available</li>\r\n<li>but the majority ha ve suffered alteration in some form</li>\r\n<li>Majority ha ve suffered alteration in some form</li>\r\n<li>Customers on Best Digital Business Card Solution.</li>\r\n</ul>', 'about-us', 'uploads/website-images/how-it-work-2023-02-20-12-28-36-1888.png', 'o5MutYFWsM8', NULL, '2023-02-20 06:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `instamojo_payments`
--

CREATE TABLE `instamojo_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `account_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sandbox',
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instamojo_payments`
--

INSERT INTO `instamojo_payments` (`id`, `api_key`, `auth_token`, `currency_rate`, `account_mode`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'test_5f4a2c9a58ef216f8a1a688910f', 'test_994252ada69ce7b3d282b9941c2', '74.66', 'Sandbox', 1, 'uploads/website-images/instamojo-2022-09-25-10-05-31-7719.png', NULL, '2022-09-25 04:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `maintainance_texts`
--

CREATE TABLE `maintainance_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintainance_texts`
--

INSERT INTO `maintainance_texts` (`id`, `status`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'uploads/website-images/maintainance-mode-2023-02-19-10-10-23-4320.png', 'We are upgrading our site.  We will come back soon.  \r\nPlease stay with us. \r\nThank you.', NULL, '2023-02-19 04:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_30_035230_create_admins_table', 2),
(6, '2021_11_30_065435_create_email_configurations_table', 3),
(7, '2021_11_30_065508_create_email_templates_table', 3),
(8, '2021_12_01_035206_create_categories_table', 4),
(19, '2021_12_06_054423_create_about_us_table', 10),
(20, '2021_12_06_055028_create_custom_pages_table', 10),
(21, '2021_12_07_030532_create_terms_and_conditions_table', 11),
(22, '2021_12_07_035810_create_blog_categories_table', 12),
(23, '2021_12_07_035822_create_blogs_table', 12),
(24, '2021_12_07_040749_create_popular_posts_table', 12),
(25, '2021_12_07_061613_create_blog_comments_table', 13),
(30, '2021_12_09_095158_create_contact_messages_table', 16),
(31, '2021_12_09_095220_create_subscribers_table', 16),
(32, '2021_12_09_124226_create_settings_table', 17),
(33, '2021_12_11_022207_create_cookie_consents_table', 18),
(34, '2021_12_11_025358_create_google_recaptchas_table', 19),
(35, '2021_12_11_025449_create_facebook_comments_table', 19),
(36, '2021_12_11_025556_create_tawk_chats_table', 19),
(37, '2021_12_11_025618_create_google_analytics_table', 19),
(38, '2021_12_11_025712_create_custom_paginations_table', 19),
(39, '2021_12_11_083503_create_faqs_table', 20),
(40, '2021_12_11_094707_create_currencies_table', 21),
(43, '2021_12_13_101056_create_error_pages_table', 23),
(44, '2021_12_13_102725_create_maintainance_texts_table', 24),
(45, '2021_12_13_110144_create_subscribe_modals_table', 25),
(47, '2021_12_13_132626_create_countries_table', 27),
(48, '2021_12_13_132909_create_country_states_table', 27),
(49, '2021_12_13_132935_create_cities_table', 27),
(50, '2021_12_14_032937_create_social_login_information_table', 28),
(51, '2021_12_14_042928_create_facebook_pixels_table', 29),
(52, '2021_12_14_054908_create_paypal_payments_table', 30),
(53, '2021_12_14_054922_create_stripe_payments_table', 30),
(54, '2021_12_14_054939_create_razorpay_payments_table', 30),
(55, '2021_12_14_055252_create_bank_payments_table', 30),
(62, '2021_12_22_034106_create_banner_images_table', 35),
(63, '2021_12_22_044839_create_sliders_table', 36),
(67, '2021_12_23_065722_create_paystack_and_mollies_table', 40),
(68, '2021_12_23_085225_create_withdraw_methods_table', 41),
(71, '2021_12_25_172918_create_seller_withdraws_table', 42),
(81, '2021_12_26_054841_create_orders_table', 45),
(88, '2021_12_28_192057_create_contact_pages_table', 47),
(89, '2021_12_28_200846_create_breadcrumb_images_table', 48),
(90, '2021_12_30_032959_create_flutterwaves_table', 49),
(91, '2021_12_30_034716_create_footers_table', 50),
(92, '2021_12_30_035201_create_footer_links_table', 50),
(93, '2021_12_30_035247_create_footer_social_links_table', 50),
(99, '2022_01_12_080218_create_seo_settings_table', 54),
(100, '2022_01_17_012111_create_menu_visibilities_table', 55),
(101, '2022_01_17_122016_create_instamojo_payments_table', 56),
(102, '2022_01_29_055523_create_messages_table', 57),
(103, '2022_01_29_122621_create_pusher_credentails_table', 58),
(104, '2022_08_28_070755_create_how_it_works_table', 59),
(105, '2022_08_29_072358_create_testimonials_table', 60),
(106, '2022_08_31_083601_create_services_table', 61),
(108, '2022_08_31_093322_create_additional_services_table', 62),
(112, '2022_09_01_103923_create_schedules_table', 63),
(113, '2022_09_05_111413_create_refund_requests_table', 64),
(114, '2022_09_06_054021_create_complete_requests_table', 65),
(115, '2022_09_06_064506_create_provider_client_reports_table', 66),
(116, '2022_09_06_072831_create_tickets_table', 67),
(117, '2022_09_06_073338_create_ticket_messages_table', 67),
(118, '2022_09_06_101227_create_message_documents_table', 68),
(119, '2022_09_26_070233_create_section_contents_table', 69),
(120, '2022_09_26_083106_create_section_controls_table', 70),
(121, '2022_09_29_044208_create_provider_client_reports_table', 71),
(122, '2023_01_09_043222_create_appointment_schedules_table', 72),
(123, '2023_01_22_032814_create_homepages_table', 73),
(125, '2023_01_22_083735_create_our_teams_table', 74),
(126, '2023_01_22_090537_create_become_authors_table', 75),
(127, '2023_01_24_085621_create_products_table', 76),
(128, '2023_01_28_101709_create_product_variants_table', 77),
(129, '2023_02_06_033829_create_pricing_plans_table', 78),
(130, '2023_02_06_103635_create_use_cases_table', 79),
(131, '2023_02_06_110157_create_sub_use_cases_table', 80),
(132, '2023_02_15_054800_create_ai_histories_table', 81);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transection_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximum_keyword_generate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_image_search` int(1) NOT NULL DEFAULT 0,
  `enable_custom_search` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `payment_method`, `payment_status`, `transection_id`, `pricing_plan_id`, `purchase_date`, `expired_date`, `expiration_day`, `plan_price`, `maximum_keyword_generate`, `enable_image_search`, `enable_custom_search`, `status`, `created_at`, `updated_at`) VALUES
(49, 'DFDSAF3434343', 1, 'bank_payment', '1', 'tnx_bank_payment', 3, '2023-02-05', '2023-02-07', '30', '120', '1200', 1, 0, 0, '2023-02-22 09:07:05', '2023-02-20 06:44:58'),
(50, 'DFDSAF3434355543', 1, 'bank_payment', '1', 'tnx_bank_payment', 3, '2023-02-05', '2023-03-07', '30', '120', '12000', 1, 0, 0, '2023-02-02 09:07:13', '2023-02-20 06:44:58'),
(51, '455799562', 1, 'Stripe', '1', 'txn_3McjrlF56Pb8BOOX1imqXlHI', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 06:25:50', '2023-02-20 06:44:58'),
(52, '707590465', 1, 'Stripe', '1', 'txn_3Mck1cF56Pb8BOOX06AMF91j', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 06:36:01', '2023-02-20 06:44:58'),
(53, '313297208', 1, 'Stripe', '1', 'txn_3Mck6pF56Pb8BOOX1ZQ7S77B', 3, '2023-02-18', NULL, '-1', '500', '18000', 1, 0, 0, '2023-02-18 06:41:24', '2023-02-20 06:44:58'),
(54, '367231209', 1, 'Stripe', '1', 'txn_3MckwrF56Pb8BOOX0zCQtA0j', 3, '2023-02-18', NULL, '-1', '500', '18000', 1, 0, 0, '2023-02-18 07:35:10', '2023-02-20 06:44:58'),
(55, '1446445110', 1, 'Paypal', '1', 'PAYID-MPYIJ2A3MV54722XA6607344', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 07:57:54', '2023-02-20 06:44:58'),
(56, '1469178585', 1, 'Razorpay', '1', 'pay_LHqecSyQ82aIxy', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 08:54:06', '2023-02-20 06:44:58'),
(57, '157896577', 1, 'Flutterwave', '1', '4161370', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 09:03:10', '2023-02-20 06:44:58'),
(58, '107262353', 1, 'Mollie', '1', 'tr_QeEeDrskaN', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 09:13:31', '2023-02-20 06:44:58'),
(59, '1448030921', 1, 'Mollie', '1', 'tr_QeEeDrskaN', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 09:15:57', '2023-02-20 06:44:58'),
(60, '177721000', 1, 'Paystack', '1', '2546694693', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 09:37:14', '2023-02-20 06:44:58'),
(61, '878556581', 1, 'Instamojo', '1', 'MOJO3218205A72195101', 2, '2023-02-18', '2023-09-06', '200', '100', '18000', 1, 0, 0, '2023-02-18 09:47:56', '2023-02-20 06:44:58'),
(62, '515621665', 1, 'Free Enroll', '1', 'free_enroll', 1, '2023-02-18', '2023-03-20', '30', '0', '12000', 1, 0, 0, '2023-02-18 10:10:01', '2023-02-20 06:44:58'),
(65, '461879404', 1, 'Stripe', '1', 'txn_3MdT7MF56Pb8BOOX0Hpf7WV1', 3, '2023-02-20', NULL, '-1', '500', '18000', 1, 1, 1, '2023-02-20 06:44:58', '2023-02-20 06:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `account_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`id`, `status`, `account_mode`, `client_id`, `secret_id`, `country_code`, `currency_code`, `currency_rate`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'sandbox', 'AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy', 'EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn', 'US', 'USD', 1, 'uploads/website-images/paypal-2022-09-25-10-04-36-1837.png', NULL, '2022-09-25 04:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `paystack_and_mollies`
--

CREATE TABLE `paystack_and_mollies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mollie_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mollie_status` int(11) NOT NULL DEFAULT 0,
  `mollie_currency_rate` double NOT NULL DEFAULT 1,
  `paystack_public_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_currency_rate` double NOT NULL DEFAULT 1,
  `paystack_status` int(11) NOT NULL DEFAULT 0,
  `mollie_country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mollie_currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystack_country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystack_currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mollie_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paystack_and_mollies`
--

INSERT INTO `paystack_and_mollies` (`id`, `mollie_key`, `mollie_status`, `mollie_currency_rate`, `paystack_public_key`, `paystack_secret_key`, `paystack_currency_rate`, `paystack_status`, `mollie_country_code`, `mollie_currency_code`, `paystack_country_code`, `paystack_currency_code`, `mollie_image`, `paystack_image`, `created_at`, `updated_at`) VALUES
(1, 'test_HFc5UhscNSGD5jujawhtNFs3wM3B4n', 1, 1.27, 'pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38', 'sk_test_77cb93329abbdc18104466e694c9f720a7d69c97', 417.35, 1, 'CA', 'CAD', 'NG', 'NGN', 'uploads/website-images/mollie-2022-09-25-10-05-09-3231.png', 'uploads/website-images/paystact-2022-09-25-10-05-19-6818.png', NULL, '2022-09-25 05:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `popular_posts`
--

CREATE TABLE `popular_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_posts`
--

INSERT INTO `popular_posts` (`id`, `blog_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-02-14 07:18:47', '2023-02-14 07:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_plans`
--

CREATE TABLE `pricing_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` int(10) NOT NULL DEFAULT 0,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximum_keyword_generate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_image_search` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable_custom_search` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_plans`
--

INSERT INTO `pricing_plans` (`id`, `serial`, `plan_name`, `plan_slug`, `plan_price`, `expiration_day`, `maximum_keyword_generate`, `enable_image_search`, `enable_custom_search`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free', '20230206101631', '0', '30', '12000', '1', 0, 1, '2023-02-06 04:16:31', '2023-02-18 04:20:52'),
(2, 2, 'Premium', '20230206102228', '100', '200', '18000', '1', 1, 1, '2023-02-06 04:22:28', '2023-02-18 10:24:48'),
(3, 3, 'Gold', '20230206102330', '500', '-1', '18000', '1', 1, 1, '2023-02-06 04:23:30', '2023-02-18 10:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_payments`
--

CREATE TABLE `razorpay_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` double NOT NULL DEFAULT 1,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `razorpay_payments`
--

INSERT INTO `razorpay_payments` (`id`, `status`, `name`, `currency_rate`, `country_code`, `currency_code`, `description`, `image`, `color`, `key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ecommerce', 74.66, 'IN', 'INR', 'This is description', 'uploads/website-images/razorpay-2022-09-25-09-45-59-6378.png', '#2d15e5', 'rzp_test_K7CipNQYyyMPiS', 'zSBmNMorJrirOrnDrbOd1ALO', NULL, '2022-09-25 03:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Home Page', 'AI Techy | AI Writing Tool', 'AI Techy | AI Writing Tool', NULL, '2023-02-19 03:55:54'),
(2, 'About Us', 'About Us - AI Techy | AI Writing Tool', 'AI Techy | AI Writing Tool', NULL, '2023-02-19 03:56:03'),
(3, 'Contact Us', 'Contact Us - AI Techy | AI Writing Tool', 'AI Techy | AI Writing Tool', NULL, '2023-02-19 03:56:10'),
(5, 'Pricing Plan', 'Pricing Plan - AI Techy | AI Writing Tool', 'AI Techy | AI Writing Tool', NULL, '2023-02-19 03:56:21'),
(6, 'Blog', 'Blog - AI Techy | AI Writing Tool', 'AI Techy | AI Writing Tool', NULL, '2023-02-19 03:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maintenance_mode` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_subscription_notify` int(11) NOT NULL DEFAULT 1,
  `enable_save_contact_message` int(11) NOT NULL DEFAULT 1,
  `text_direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LTR',
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_lg_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_sm_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topbar_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topbar_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` double NOT NULL DEFAULT 1,
  `theme_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriber_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriber_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_subscription_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home3_subscription_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_page_subscription_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_foreground` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_call_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_form_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_form_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_foreground` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_theme` int(1) NOT NULL DEFAULT 0,
  `theme_one_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_two_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_three_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_ai_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `maintenance_mode`, `logo`, `favicon`, `contact_email`, `enable_subscription_notify`, `enable_save_contact_message`, `text_direction`, `timezone`, `sidebar_lg_header`, `sidebar_sm_header`, `topbar_phone`, `topbar_email`, `opening_time`, `currency_name`, `currency_icon`, `currency_rate`, `theme_one`, `subscriber_image`, `subscriber_title`, `subscriber_description`, `subscription_bg`, `home2_subscription_bg`, `home3_subscription_bg`, `blog_page_subscription_image`, `default_avatar`, `home2_contact_foreground`, `home2_contact_background`, `home2_contact_call_as`, `home2_contact_phone`, `home2_contact_available`, `home2_contact_form_title`, `home2_contact_form_description`, `how_it_work_background`, `how_it_work_foreground`, `how_it_work_title`, `how_it_work_description`, `how_it_work_items`, `selected_theme`, `theme_one_color`, `theme_two_color`, `theme_three_color`, `login_image`, `footer_logo`, `open_ai_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/website-images/logo-2023-02-16-04-21-00-4656.png', 'uploads/website-images/favicon-2023-02-14-09-41-37-3577.png', 'contact@gmail.com', 1, 1, 'ltr', 'Asia/Dhaka', 'AITECHY', 'AI', '+1347-430-9510', 'websolutionus1@gmail.com', '10.00 AM-7.00PM', 'USD', '$', 85.76, '#009bc2', 'uploads/website-images/sub-foreground--2023-01-22-01-32-17-2063.png', 'Subscribe Now', 'Get the updates, offers, tips and enhance your page building experience', 'uploads/website-images/sub-background-2023-01-22-01-31-07-6655.png', 'uploads/website-images/sub-background-2023-01-22-01-31-31-6669.png', 'uploads/website-images/sub-background-2023-01-22-01-31-53-4069.png', 'uploads/website-images/blog-sub-background-2023-01-22-01-32-27-1478.png', 'uploads/website-images/default-avatar-2023-02-16-03-33-22-6349.png', 'uploads/website-images/home2-contact-foreground--2022-12-03-06-08-24-3082.png', 'uploads/website-images/home2-contact-background-2022-09-22-12-08-16-6090.jpg', 'Call as now', '+90 456 789 251', 'We are available 24/7', 'Do you have any question ?', 'Fill the form now & Request an Estimate', 'uploads/website-images/home3-hiw-background-2022-09-22-12-52-40-5965.jpg', 'uploads/website-images/home3-hiw-foreground--2022-09-29-01-06-00-1394.jpg', 'Enjoy Services', 'If you are going to use a passage of you need to be sure there isn\'t anything emc barrassing hidden in the middle', '[{\"title\":\"Select The Service\",\"description\":\"There are many variations of passages of Lorem Ipsum available, but the majority have\"},{\"title\":\"Pick Your Schedule\",\"description\":\"There are many variations of passages of Lorem Ipsum available, but the majority have\"},{\"title\":\"Place Your Booking & Relax\",\"description\":\"There are many variations of passages of Lorem Ipsum available, but the majority have\"}]', 0, '#378fff', '#00bf8c', '#2251f2', 'uploads/website-images/login-page-2022-11-06-04-12-11-6638.png', 'uploads/website-images/logo-2023-02-16-04-21-09-8103.png', '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', NULL, '2023-02-19 03:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `home1_title`, `home1_description`, `home1_image`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Create Your Own Digital Business', 'Lorem Ipsum is simply dummy text of the printing and has been the industry\'s standard dummy text ever since printer took a galley. Lorem Ipsum is simply dummy text of the printing.', 'uploads/website-images/slider-2023-02-14-09-51-36-6710.png', 'contact-us', '2022-01-30 10:25:59', '2023-02-18 11:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `social_login_information`
--

CREATE TABLE `social_login_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_facebook` int(11) NOT NULL DEFAULT 0,
  `facebook_client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_secret_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_gmail` int(11) NOT NULL DEFAULT 0,
  `gmail_client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_secret_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_redirect_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_redirect_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_login_information`
--

INSERT INTO `social_login_information` (`id`, `is_facebook`, `facebook_client_id`, `facebook_secret_id`, `is_gmail`, `gmail_client_id`, `gmail_secret_id`, `facebook_redirect_url`, `gmail_redirect_url`, `created_at`, `updated_at`) VALUES
(1, 0, '1844188565781706', 'f32f45abcf57a4dc23ac6f2b2e8e2241', 0, '810593187924-706in12herrovuq39i2pbn483otijei8.apps.googleusercontent.com', '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', 'http://localhost/web-solution-us/open-ai/callback/google', 'http://localhost/web-solution-us/open-ai/callback/google', NULL, '2023-02-20 07:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_payments`
--

CREATE TABLE `stripe_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `stripe_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_payments`
--

INSERT INTO `stripe_payments` (`id`, `status`, `stripe_key`, `stripe_secret`, `created_at`, `updated_at`, `country_code`, `currency_code`, `currency_rate`, `image`) VALUES
(1, 1, 'pk_test_51JU61aF56Pb8BOOX5ucAe5DlDwAkCZyffqlKMDUWsAwhKbdtuY71VvIzr0NgFKjq4sOVVaaeeyVXXnNWwu5dKgeq00kMzCBUm5', 'sk_test_51JU61aF56Pb8BOOXlz7jGkzJsCkozuAoRlFJskYGsgunfaHLmcvKLubYRQLCQOuyYHq0mvjoBFLzV7d8F6q8f6Hv00CGwULEEV', NULL, '2022-09-25 04:04:48', 'US', 'USD', 1, 'uploads/website-images/stripe-2022-09-25-10-04-48-4289.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `verified_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `verified_token`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'testapi@gmail.com', 0, 'ZaCyHZZFSJyYQh9Er4ptOPumu', 0, '2022-11-08 09:59:18', '2022-11-08 09:59:18'),
(2, 'user@gmail.com', 0, 'Mbty4AucywRXstU1BFTEGUvC8', 0, '2023-02-14 10:22:48', '2023-02-14 10:22:48'),
(3, 'patient@gmail.com', 0, 'h89QLs2ydFctCl0oTMl0eoklh', 0, '2023-02-14 10:23:34', '2023-02-14 10:23:34'),
(4, 'agent@gmail.com', 0, NULL, 1, '2023-02-16 06:55:29', '2023-02-16 06:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `sub_use_cases`
--

CREATE TABLE `sub_use_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `use_case_id` int(11) NOT NULL,
  `sub_use_case` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_use_cases`
--

INSERT INTO `sub_use_cases` (`id`, `use_case_id`, `sub_use_case`, `created_at`, `updated_at`) VALUES
(1, 6, 'Facebook', NULL, '2023-02-06 11:57:04'),
(2, 6, 'Twitter', NULL, '2023-02-06 11:57:04'),
(3, 6, 'LinkedIn', NULL, '2023-02-06 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `tawk_chats`
--

CREATE TABLE `tawk_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tawk_chats`
--

INSERT INTO `tawk_chats` (`id`, `chat_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://embed.tawk.to/612dc781d6e7610a49b2d444/1fedd6l9m', 0, NULL, '2023-02-16 10:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms_and_condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `terms_and_condition`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<p><b>1. What Are Terms and Conditions?</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p><b>2. Does My Online Service Need Terms and Conditions?</b></p>\r\n\r\n<p>While it’s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site.&nbsp;</p>\r\n\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n\r\n<p><b>Features :</b></p>\r\n\r\n<ul><li>Lim body with metal cover</li><li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li><li>8GB DDR4 RAM and fast 512GB PCIe SSD</li><li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li></ul>\r\n\r\n<p><b>3. Protect Your Property</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p><b>4. What to Include in Terms and Conditions for Online Stores</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.<br></p>\r\n\r\n<p><b>05.Pricing and Payment Terms</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.<br></p>', '<p><b>1. What Are Privacy Policy?</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p><b>2. Ecommerce Terms and Conditions Examples</b></p>\r\n\r\n<p>While it’s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n\r\n<p><b>Features :</b></p>\r\n\r\n<ul><li>Slim body with metal cover</li><li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li><li>8GB DDR4 RAM and fast 512GB PCIe SSD</li><li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li></ul>\r\n\r\n<p><b>3. Protect Your Property</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p><b>4. What to Include in Terms and Conditions for Online Stores</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas  Ipsum to make a type specimen book.</p>\r\n\r\n<p><b>05.Pricing and Payment Terms</b></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn’t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn’t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.<br></p>', '2022-01-30 12:34:53', '2023-01-15 04:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `designation`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'uploads/custom-images/john-doe20230218094105.jpg', 'MBBS, FCPS, FRCS', 'There are mainy variatons of passages of abut the majority have suffereds alteration in humour, or randomisejd words which rando generators on the Internet tend', '5', 1, '2022-09-29 06:44:37', '2023-02-18 03:41:05'),
(2, 'David Richard', 'uploads/custom-images/david-richard20230218094313.jpg', 'Web Developer', 'There are mainy variatons of passages of abut the majority have suffereds alteration in humour, or randomisejd words which rando generators on the Internet tend', '3', 1, '2022-09-29 06:45:35', '2023-02-18 03:43:13'),
(3, 'David Simmons', 'uploads/custom-images/david-simmons20230218094215.jpg', 'Graphic Designer', 'There are mainy variatons of passages of abut the majority have suffereds alteration in humour, or randomisejd words which rando generators on the Internet tend', '5', 1, '2022-09-29 06:46:43', '2023-02-18 03:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` int(1) NOT NULL DEFAULT 0,
  `total_word` int(255) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `remember_token`, `forget_password_token`, `forget_password_otp`, `status`, `provider_id`, `provider`, `provider_avatar`, `image`, `phone`, `address`, `verify_token`, `email_verified`, `total_word`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', NULL, 'user@gmail.com', NULL, '$2y$10$hVlXEzukQE4WfVHB7sxbCeoJeqB3Qhv8GZWxPPupbtGofPsmU5Cvy', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'uploads/custom-images/john-doe-2023-02-18-03-03-59-9617.jpg', '123-343-4444', 'Florida City, FL, USA', NULL, 1, 0, '2022-09-29 07:44:31', '2023-02-20 06:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `use_cases`
--

CREATE TABLE `use_cases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `use_cases`
--

INSERT INTO `use_cases` (`id`, `icon`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fas fa-briefcase', 'Business Ideas', 'business-ideas', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:52:25'),
(2, 'far fa-edit', 'Blog Idea & Outline', 'blog-idea', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:53:20'),
(3, 'fas fa-blog', 'Blog Section Writing', 'blog-section-writing', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:54:01'),
(4, 'far fa-notes-medical', 'Cover Letter', 'cover-letter', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:54:54'),
(5, 'fas fa-image', 'Image Generate', 'image-generate', 'There are many variations of passages Lorem', 0, NULL, '2023-02-14 04:55:41'),
(6, 'fab fa-adversal', 'Facebook, Twitter, LinkedIn Ads', 'social-media-ads', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:56:20'),
(7, 'fab fa-google-plus-g', 'Google Search Ads', 'google-search-ads', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:56:51'),
(8, 'far fa-video', 'Video Idea', 'video-idea', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:57:17'),
(9, 'far fa-play', 'Video Description', 'video-description', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:57:44'),
(10, 'far fa-search-dollar', 'SEO Meta Title', 'seo-meta-title', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:58:06'),
(11, 'far fa-search', 'SEO Meta Description', 'seo-meta-description', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 04:58:34'),
(12, 'far fa-palette', 'Post and Caption Idea', 'post-caption-idea', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 05:00:37'),
(13, 'far fa-file-alt', 'Product Description', 'product-description', 'There are many variations of passages Lorem', 1, NULL, '2023-02-14 05:01:14'),
(14, 'far fa-file-alt', 'Tag generation', 'tag-manager', 'There are many variations of passages Lorem', 1, NULL, '2023-02-15 04:28:49'),
(15, 'far fa-file-alt', 'Custom Prompt', 'custom-prompt', 'There are many variations of passages Lorem', 1, NULL, '2023-02-15 04:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ai_histories`
--
ALTER TABLE `ai_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_payments`
--
ALTER TABLE `bank_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breadcrumb_images`
--
ALTER TABLE `breadcrumb_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_pages`
--
ALTER TABLE `contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_consents`
--
ALTER TABLE `cookie_consents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_countries`
--
ALTER TABLE `currency_countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_paginations`
--
ALTER TABLE `custom_paginations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configurations`
--
ALTER TABLE `email_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_pages`
--
ALTER TABLE `error_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_comments`
--
ALTER TABLE `facebook_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_pixels`
--
ALTER TABLE `facebook_pixels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flutterwaves`
--
ALTER TABLE `flutterwaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_analytics`
--
ALTER TABLE `google_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_recaptchas`
--
ALTER TABLE `google_recaptchas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instamojo_payments`
--
ALTER TABLE `instamojo_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintainance_texts`
--
ALTER TABLE `maintainance_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paystack_and_mollies`
--
ALTER TABLE `paystack_and_mollies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `popular_posts`
--
ALTER TABLE `popular_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_plans`
--
ALTER TABLE `pricing_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `razorpay_payments`
--
ALTER TABLE `razorpay_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login_information`
--
ALTER TABLE `social_login_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_payments`
--
ALTER TABLE `stripe_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_use_cases`
--
ALTER TABLE `sub_use_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tawk_chats`
--
ALTER TABLE `tawk_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `use_cases`
--
ALTER TABLE `use_cases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ai_histories`
--
ALTER TABLE `ai_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bank_payments`
--
ALTER TABLE `bank_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `breadcrumb_images`
--
ALTER TABLE `breadcrumb_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_pages`
--
ALTER TABLE `contact_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cookie_consents`
--
ALTER TABLE `cookie_consents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `currency_countries`
--
ALTER TABLE `currency_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_paginations`
--
ALTER TABLE `custom_paginations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_configurations`
--
ALTER TABLE `email_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `error_pages`
--
ALTER TABLE `error_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facebook_comments`
--
ALTER TABLE `facebook_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facebook_pixels`
--
ALTER TABLE `facebook_pixels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flutterwaves`
--
ALTER TABLE `flutterwaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `google_analytics`
--
ALTER TABLE `google_analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google_recaptchas`
--
ALTER TABLE `google_recaptchas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instamojo_payments`
--
ALTER TABLE `instamojo_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintainance_texts`
--
ALTER TABLE `maintainance_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paystack_and_mollies`
--
ALTER TABLE `paystack_and_mollies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popular_posts`
--
ALTER TABLE `popular_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing_plans`
--
ALTER TABLE `pricing_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `razorpay_payments`
--
ALTER TABLE `razorpay_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_login_information`
--
ALTER TABLE `social_login_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_payments`
--
ALTER TABLE `stripe_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_use_cases`
--
ALTER TABLE `sub_use_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tawk_chats`
--
ALTER TABLE `tawk_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `use_cases`
--
ALTER TABLE `use_cases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
