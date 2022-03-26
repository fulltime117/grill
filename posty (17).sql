-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 08:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posty`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `banner`, `banner_title`, `image`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, '/front-assets/images/default/aboutus.png', 'עלינו', '/front-assets/images/default/aboutus.png', 'גרילמן קו לי & כיתת גריל', 'אתר גרילמן הינו פרי פיתוחה של קהילת קרניבורים אורגינל, קהילת האוכל והבשר הגדולה בישראל, כ400 אלף משתמשים וחשיפה חודשית רחבת היקף. אתר זה הוקם על מנת ללמד את רזי המקצוע כיצד להיות גרילמן מקצועי ולהפוך את ההנאה למקצוע מהנה שמכניס כסף רב בכבוד, לחדד את הבקיאות בתחום, ללמד כיצד להקים עסק מ-0 וכן כיצד למנף את העסק למקומות גבוהיים במיוחד. האתר כולל הדרכה, צ\'ט לכל אורך הלימוד למתן שאלות ותשובות, שאלות אמריקאיות בתהליך השיעורים, תמיכה מלאה של הצוות עד סיום הלימודים בהצטיינות והפיכת הלימוד הלכה למעשה. החומר נלמד בצורה פשוטה מאוד - סרטון וידאו וטקסט, כל קורס מאגד בתוכו בתמצית מלאה אך רחבת היקף, הכוללת שיווק, הסתכלות על העסק מצד מקצועי והסברים ע\"י המומחים לבשר, שיווק וכן לניהול עסק. אין צורך בידע מקדים - הכל נלמד כאן מאפס. בהצלחה!...', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner`, `title`, `type`, `created_at`, `updated_at`) VALUES
(1, '/storage/banners/gS5ys2ERQm5gsmg5IYiKge9g9a0rwCf2zZOyGecP.png', 'קוּרס', 'course', NULL, NULL),
(2, '/storage/banners/Fk3kcoa0HKITztxk9bCIJg7bjph03upWEbeF82RS.jpg', 'החדשות שלנו', 'post', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quisquam.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(2, 'Molestias.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(3, 'Eligendi.', '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `comingsoons`
--

CREATE TABLE `comingsoons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count_down_date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_login` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `banner`, `title`, `email`, `phone`, `address`, `business`, `po`, `active`, `image`, `created_at`, `updated_at`) VALUES
(1, '/storage/contactus/DcxXWVEPjfWN4Fh4wlT2GuGZ6R9uAcl7i8kfqqkM.png', 'here contact us', 'info@grillman.com', '+972424474763', 'rotchild 72, rishon lezion', 'Grilman@media.com', '... P.O.', 1, '/front-assets/images/default/contactus.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contract_content`
--

CREATE TABLE `contract_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'our policy',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `temp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_content`
--

INSERT INTO `contract_content` (`id`, `name`, `active`, `temp`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Product cancellation', 1, NULL, '<p>מדיניות ביטולים וגילוי נאות</p><p>תקנון אתר GRILLMAN.CO.IL</p><p><br></p><p>מדיניות פרטיות:</p><p>אורגינל מדיה מכבדת את פרטיות לקוחותיו והמשתמשים בשירותיו ורואה חשיבות רבה בשמירה עליה.</p><p>האתר/עסק עושה מאמצים רבים על מנת לשמור כיאות על המידע שנמסר על ידך ונוקט באמצעים רבים וחדשניים כדי לשמור על אבטחת המידע ועל פרטיותך.</p><p>הצהרת פרטיות זו מפרטת את המידע שהאתר/עסק אוסף אודותיך ואת השימושים במידע זה אגב שימושך בשירותיו הדיגיטליים, לרבות אתרי האינטרנט והקורס של האתר/עסק, יישומונים (אפליקציות) סלולריים ושירותים מקוונים אחרים (להלן יחד \"השירותים\" או \"השירותים המקוונים\").</p><p>במידת הצורך, לגבי מוצרים ושירותים ספציפיים מפורטים יחד עם אותם מוצרים ו/או שירותים פרטים נוספים.</p><p> </p><p>1.  כל הנתונים שיימסרו על ידך אגב השימוש באתר ו/או ביישום (אפליקציה) ו/או בשירותים נלווים להם, לרבות פרטי זיהוי אישיים ופרטים נוספים, לרבות בעת העברת ו/או קבלת כספים באמצעות השירותים, נמסרים מרצונך ובהסכמתך ומבלי שחלה עליך חובה חוקית למסרם. ידוע לך והנך מסכים שהמידע יוחזק במאגרי המידע של אורגינל מדיה ו/או מי מטעמה או עבורה, בארץ ובחו\"ל.</p><p> </p><p>2.  המידע המתקבל עם ועקב השירותים ו/או השימוש בשירותים , לרבות בעת ביצוע רכישה, קניה ופעולות וכל מידע אחר הנובע מפעילותך בהם ייאגר במאגרי מידע כאמור.</p><p> </p><p> </p><p>3.  השירותים מיועדים בעיקרם למשתמשים מעל גיל 15. ככל שיתאפשר שירות מסוים למשתמשים בגילאים נמוכים מ- 15, על משתמשים אלו לקבל הסכמה של אחד הוריהם או האפוטרופוס החוקי שלהם, טרם השימוש בשירותים ומסירת פרטים אישיים במסגרתם. האתר/עסק רשאי ועשוי לנקוט באמצעי אבטחה ובתוכנות אוטומטיות לשם אפיון נתוני משתמשים על מנת לוודא ו/או לאמת זהות משתמשים בשירותיו המקוונים/הדיגיטליים השונים ולשם מניעת הונאות, תרמיות והתחזויות לרבות תאריך לידה, מספר תעודת זהות ועוד.</p><p> </p><p>4.  ידוע לך והנך מסכים לכך שאורגינל מדיה יעשה שימוש במידע לצורך מתן השירותים ו/או קבלת החלטות , לרבות באמצעות צד ג\'. כמו כן הנך מסכים ומאשר שהאתר/עסק ישתמש במידע לצורך יצירת קשר עמך ו/או לצורך שיווק ישיר או אוטומטי, פרסום או הגברת נאמנות ו/או לצורך ניטור ו/או ניתוח סטטיסטי של המידע לצרכיו ו/או בכדי למנוע הונאות ו/או פעילות בלתי חוקית, והכל בכפוף להוראות כל דין.</p><p> </p><p>5.  האתר/עסק רשאי לעבד ולאפיין את המידע שנמסר על ידך ו/או מידע אודות פעילותך, לרבות באמצעות מי מטעמו. תוצרי עיבוד המידע על ידי הבנק עשויים לשמש כדי להציע לך מוצרים או שירותים שונים שעשוי להיות לך עניין או צורך בהם, מעת לעת, והכל בכפוף לזכויותיך על פי כל דין.</p><p> </p><p>6.  כל המידע שיימסר על ידיך ו/או מידע שיתקבל במסגרת השירותים ו/או בעקבות שימושך באתר ו/או באפליקציה, יישמר בסודיות בהתאם לחוק הגנת הפרטיות, התשמ\"א – 1981 ובכפוף לחובות ואו דרישות חוקיות או רגולטוריות החלות על העסק.</p><p><br></p><p>אספקת מוצר:</p><p>אספקת המוצרים תתבצע בהתאם לתנאים המופיעים בעמוד המכירה של המוצר.</p><p>זמני אספקת המוצרים מצוינים בדף המכירה, כוללים את חישובם של ימי עסקים (ימי א\' עד ו\', כולל ימי שישי, שבת, ערבי חג וימי חג).</p><p>בעת תשלום מאובטח ויצירת משתמש – ישלח למשתמש אישור בהודעת SMS לאישור וסיום העסקה עם מדיניות ביטולים.</p><p>קבלה/חשבונית תשלח באופו אוטומטי על ידי צד ג\' (קארדקום בע\"מ) למייל המשתמשים בסיום העסקה.</p><p>כל עוד לא הסתיימה העסקה – יכול המשתמש להתחרט בכל עת ולצאת במיידי מהאתר, משכבר נרשם לאתר, אושר מדיניות ביטולים בהודעת SMS והמשתמש נוצר אין אפשרות להחזר כספי היות וקורס הרכישה באתר GRILLMAN.CO.IL זמין לקריאה והעתקה ושכפול.</p><p>אספקת המוצר (להלן; הקורס/גישה לקורס) תתבצע במיידי לאחר תשלום לפי משתמש וסיסמה שהמשתמש עצמו יצר.</p><p><br></p><p><br></p><p>מדיניות ביטולים:</p><p>לאחר שקראתי בעיון רב הבנתי ואני מסכים/ה ומאשר/ת את פרטי תקנון התשלום בקורס הגרילמן של קרניבורים אורגינל, </p><p>ואני חותמ/ת ומצהיר/ה כי הבנתי היטב והסכמתי לתנאים הבאים:</p><p>ידוע לי והוסבר לי היטב כי הקורס הזה נמנה עם קורסים הנחשבים לקורס הניתן לשעתוק שכפול והקלטה ועל כן זהו קורס שלא ניתן לבטל או לבקש את כספך בחזרה או לבקש תשלום חלקי בחזרה.</p><p>מהרגע שאני מקבל סיסמה לקורס ואני חותם על הסכם זה אני מבין שלא ניתן לקבל את כספי בחזרה.</p><p>ולכן, אם את/ה מבקש/ת לשמור לך את הזכות לבטל עסקה, אל תירשמ/י ואל תקבל/י סיסמה המאפשרת לך לצפות בתוכן כלשהו מהתכנים הנלמדים בקורס.</p><p>את/ה חותמ/ת חתימה אינטרנטית ו/או חתימה באס אם אס או דרך הווצטאפ או חתימה ידנית. </p><p>ולא תטען שום טענה בעתיד שלא קיבלת מסמך גילוי נאות לפני הרכישה והלימוד ו/או לא הוסבר לך דיניי החוק בנושא ביטול והחזר כספי.</p><p>בכבוד רב הנהלת אורגינל מדיה המפעילה את קורס הגרילמן המקצועי, ע\"מ 302903448</p><p><br></p><p><br></p><p>פניה ישירה לעסק:</p><p>מייל: PR@CARNIVORES.COM</p><p>טלפון: 052-6336776</p><p>דואר: רוטשילד 72, ראשון לציון</p><p>ע.מ: 302903448</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` date NOT NULL,
  `discount` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_user`
--

CREATE TABLE `coupon_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `use_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `overview`, `course_price`, `type`, `media`, `media_name`, `media_size`, `body`, `cover_image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'test course', 'Et excepturi non adipisci. Expedita repudiandae iste necessitatibus et.', '1', 'vimeo', 'https://player.vimeo.com/video/1084537', 'funny vimeo', '15min', 'some description.... ', '/storage/courses/QyQqwA2DjJyGafGFKrf8bJx7VjrkaFjabvNeQwEb.jpg', 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `lesson_number` int(11) NOT NULL DEFAULT 1,
  `sign_data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diplomas`
--

CREATE TABLE `diplomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `diploma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailtypes`
--

CREATE TABLE `emailtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailtypes`
--

INSERT INTO `emailtypes` (`id`, `type`, `from_name`, `from_email`, `logo`, `subject`, `body`, `site`, `created_at`, `updated_at`) VALUES
(1, 'welcome', NULL, NULL, NULL, NULL, 'Hi {FIRSTNAME} welcome', NULL, NULL, NULL);

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
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pagename',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bottom` tinyint(1) NOT NULL DEFAULT 1,
  `is_top` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `banner`, `banner_title`, `page_name`, `slug`, `is_bottom`, `is_top`, `meta_title`, `meta_description`, `meta_keyword`, `title`, `body`, `published`, `created_at`, `updated_at`) VALUES
(1, '/storage/static/DKyVfgKp70SpqdTt7MhsIrwCGJCEXxhR3puYTwlM.jpg', 'test static page', 'test page', 'test-page', 1, 1, NULL, NULL, NULL, 'ברוך הבא', '<p><br></p><p>המקצועי,</p><p>בהסכם התקשרות בין אורגינל מדיה ע\"מ 302903448 לבין לקוח/ה הרוכש/ת קורס זה מתקיים</p><p>אחריות אישית ותמיכה בכל שלבי הקורס, לרבות צ\'ט עזרה ותכתובות בכל נושא שהוא, בכל תכתובת והתקשרות </p><p>אחריות אורגינל מדיה לענות ולעזור ללמדי הקורס בכל שלבים עד לסיום.</p><p>היות וקורס זה הינו קורס אינטרנטי האחריות הינה על הלמד, ללמוד לפי זמנו ושעתו, אין בעל העסק אחראי על זמנים, הצלחת הלמד</p><p>וכן על הכנסתו העתידית לרבות לאחר שקיבל דיפלומה על אף בתנאי שסיים את כל לימודיו, הלמד רשאי לעסוק במקצוע חופשי זה</p><p>ואת לימודיו יכול לרכוש באתר grillmam.co.il</p><p>כמו כן במסמך ההסכמה ואישור התקשרות יש תאריך המונפק באזור האישי, תאריך חתימה על מסמך מדיניות האתר וביטול עסקה</p><p><br></p><p>פרטי בית עסק:</p><p>שם עסק - אורגינל מדיה</p><p>ע\"מ - 302903448</p><p>כתובת- רוטשילד 72 ראשון לציון</p><p>מס\' טלפון- 0526336776</p><p>אימייל- pr@carnivores.com</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `title`, `body`, `image`, `type`, `items`, `created_at`, `updated_at`) VALUES
(1, 'ברוכים הבאים לגרילמן', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iMjE2LjAwMDAwMHB0IiBoZWlnaHQ9IjIxNi4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDIxNi4wMDAwMDAgMjE2LjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgo8bWV0YWRhdGE+CkNyZWF0ZWQgYnkgcG90cmFjZSAxLjEwLCB3cml0dGVuIGJ5IFBldGVyIFNlbGluZ2VyIDIwMDEtMjAxMQo8L21ldGFkYXRhPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCwyMTYuMDAwMDAwKSBzY2FsZSgwLjEwMDAwMCwtMC4xMDAwMDApIgpmaWxsPSIjY2JiNThiIiBzdHJva2U9Im5vbmUiPgo8cGF0aCBkPSJNNjY4IDE5OTUgYy0yMSAtMjQgLTM4IC00OSAtMzggLTU3IDAgLTcgLTE4IC0yOCAtNDAgLTQ2IC0zNyAtMzEKLTQwIC0zMiAtNDAgLTExIDAgMTQgNSAxOSAxNCAxNiA5IC00IDE2IDMgMjAgMTYgNyAyOCA2IDc3IC0xIDU3IC0zIC04IC0xOQotMzAgLTM1IC00OSAtMTcgLTE5IC0yNyAtMzkgLTIzIC00OSA1IC0xMyAtMjQgLTUyIC0zOCAtNTIgLTMgMCAtMiAyMCAxIDQ1IDIKMjUgMCA0NSAtNSA0NSAtNSAwIC05IC0xMCAtMTAgLTIxIC0xIC0xMiAtMTIgLTMyIC0yNCAtNDUgLTE1IC0xNiAtMjAgLTMwCi0xNSAtNDggNSAtMTkgMCAtMjkgLTE5IC00NCAtMTQgLTExIC0yNSAtMjUgLTI1IC0zMSAwIC02IC00IC0xMSAtMTAgLTExIC0xNgowIC0xMiAyMiA2IDM1IDE0IDEwIDE1IDE4IDYgNTEgLTYgMjQgLTEwIDMxIC0xMSAxNyAtMSAtMTIgLTEwIC0zOCAtMjIgLTU3Ci0xNSAtMjcgLTE4IC0zOSAtMTAgLTU0IDggLTE1IDYgLTIzIC04IC0zNiAtMTggLTE2IC0xOSAtMTUgLTI1IDE4IC00IDE5IC0xMgozOCAtMTggNDIgLTcgNSAtOCAzIC0zIC01IDQgLTcgLTEgLTMzIC0xMCAtNTcgLTEzIC0zNSAtMTQgLTQ4IC01IC01OSA5IC0xMQo4IC0xOSAtMyAtMzYgLTE1IC0yMSAtMTYgLTIwIC0zNiAyMiAtMTIgMjQgLTE5IDM2IC0xNiAyNSAzIC0xMCAwIC0zNiAtNSAtNTcKLTggLTI3IC04IC00NSAwIC01OSAxMyAtMjQgLTggLTExMCAtMjEgLTg4IC01IDcgLTYgMjIgLTMgMzQgMyAxMSAtMiAzMCAtMTMKNDMgLTE4IDIyIC0xOCAyMiAtMTggLTMyIDAgLTMxIDYgLTYxIDE0IC03MCAxMCAtMTMgMTEgLTI0IDIgLTQ4IC02IC0xNyAtOAotMzUgLTYgLTM5IDMgLTUgMSAtMTEgLTQgLTE0IC01IC0zIC0xMSAzIC0xNCAxNCAtMyAxMCAwIDIxIDcgMjMgNiAyIDAgMTgKLTE4IDQxIC0xNSAyMSAtMzEgMzUgLTM0IDMxIC0zIC0zIDAgLTExIDYgLTE3IDcgLTcgMTIgLTMxIDEyIC01NCAwIC0yNSA2Ci00NyAxNSAtNTQgOCAtNyAxNSAtMjYgMTUgLTQ0IGwwIC0zMSAtMzEgMzggYy0xNyAyMCAtMzUgMzcgLTQxIDM3IC02IDAgLTQKLTggNSAtMTggMTAgLTEwIDE3IC0zMyAxNyAtNTAgMCAtMTcgOCAtMzkgMTkgLTQ5IDE1IC0xNSAzNiAtNzMgMjYgLTczIC0yIDAKLTE3IDE0IC0zNSAzMCAtMzUgMzIgLTY0IDQyIC0zNyAxMiA5IC0xMCAyMCAtMzIgMjMgLTUwIDQgLTE3IDE3IC0zOCAzMCAtNDcKMTUgLTEwIDI0IC0yNSAyNCAtNDEgbDAgLTI2IC0zMSAyNiBjLTM1IDMwIC02MCAzNSAtMzcgOSA4IC0xMCAyMCAtMzIgMjcgLTUwCjcgLTE4IDIyIC0zNSAzMyAtMzkgMTUgLTQgMzggLTQwIDM4IC01OSAwIC0yIC0xOSA3IC00MiAyMCAtNTAgMjkgLTczIDMyIC00Mgo3IDEyIC05IDMwIC0zMiA0MCAtNDkgMTAgLTE4IDI2IC0zMyAzNiAtMzMgMTAgMCAyNCAtMTMgMzMgLTMwIDE4IC0zNSAxNyAtMzUKLTIxIC0xNSAtMTYgOCAtMzggMTUgLTQ5IDE0IC0yMCAwIC0yMCAtMSAxIC0xMCAxMSAtNiAyOCAtMjQgMzggLTQwIDExIC0xOQoyNSAtMjkgNDAgLTI5IDE0IDAgMzAgLTEwIDQwIC0yNSAyMSAtMzEgMjAgLTM4IC0yIC0yNyAtMjggMTUgLTgyIDIyIC04MiAxMgowIC02IDUgLTEwIDEyIC0xMCA2IDAgMjMgLTEwIDM2IC0yMiAxNyAtMTYgMjYgLTE5IDI5IC0xMCAzIDYgMTYgMTIgMjkgMTIgMjkKMCAzMCA2IDMgNDkgLTM0IDU2IC03NyAxNzUgLTk1IDI2MiAtMjAgMTAxIC0xNSAzMTAgMTEgNDA5IDM0IDEyOSAxMTkgMjg0CjIxNCAzOTIgNjEgNjkgMTkwIDE2MiAyODkgMjA5IDkyIDQ0IDExNyA2MSAxMzQgOTQgMTAgMTkgMTAgMTkgLTggMyAtMTAgLTkKLTMyIC0yMCAtNDkgLTI0IC0xNiAtNCAtNDYgLTIwIC02NSAtMzUgLTQ0IC0zNCAtODMgLTQ3IC03NCAtMjUgMyA5IDE0IDE2IDI0CjE2IDEyIDAgMjIgMTIgMzAgMzYgNyAxOSAxMCAzNyA4IDM5IC0xIDIgLTIwIC0xNiAtNDAgLTQweiBtLTE5NiAtMTk3IGMtMTUKLTE1IC0yNCAtNiAtMTYgMTYgNSAxMiAxMCAxNCAxNyA3IDggLTggOCAtMTQgLTEgLTIzeiBtLTE1NyAtMTc4IGMtNiAtOSAtOQotOSAtMTYgMSAtMTAgMTcgMCAzNCAxMyAyMSA2IC02IDcgLTE2IDMgLTIyeiBtLTU1IC0xMDEgYzAgLTUgLTQgLTkgLTEwIC05Ci01IDAgLTEwIDcgLTEwIDE2IDAgOCA1IDEyIDEwIDkgNiAtMyAxMCAtMTAgMTAgLTE2eiBtLTEwMSAtMzUzIGMwIC0xNCAtMgotMTYgLTYgLTYgLTMgOCAtMTAgMjEgLTE2IDI4IC03IDkgLTYgMTEgNyA2IDkgLTMgMTYgLTE2IDE1IC0yOHogbS00IC0xMDYgYzMKLTUgLTEgLTEwIC05IC0xMCAtOSAwIC0xNiA1IC0xNiAxMCAwIDYgNCAxMCA5IDEwIDYgMCAxMyAtNCAxNiAtMTB6IG0xMCAtMTIwCmMzIC01IDEgLTEwIC00IC0xMCAtNiAwIC0xMSA1IC0xMSAxMCAwIDYgMiAxMCA0IDEwIDMgMCA4IC00IDExIC0xMHogbTMwCi0xMjAgYzMgLTUgMiAtMTAgLTQgLTEwIC01IDAgLTEzIDUgLTE2IDEwIC0zIDYgLTIgMTAgNCAxMCA1IDAgMTMgLTQgMTYgLTEwegptNDAgLTExMCBjMyAtNSAyIC0xMCAtNCAtMTAgLTUgMCAtMTMgNSAtMTYgMTAgLTMgNiAtMiAxMCA0IDEwIDUgMCAxMyAtNCAxNgotMTB6Ii8+CjxwYXRoIGQ9Ik0xNDkzIDIwMTUgYzIgLTE2IDggLTM4IDEyIC00NyAxMSAtMjYgLTkgLTIyIC00MSA3IC0xNSAxNCAtMzcgMjUKLTQ4IDI1IC0xMiAwIC0zMiA3IC00NCAxNiAtMTIgOCAtMjIgMTEgLTIyIDYgMCAtMTggNDggLTUwIDE0MCAtOTUgMjkyIC0xNDAKNDc4IC0zOTkgNTIwIC03MjUgMjEgLTE2MyAtOSAtMzQwIC04NSAtNDk5IC0yNCAtNTEgLTQ1IC05MyAtNDcgLTkzIC0yIDAgLTQ0CjE2IC05MyAzNiAtMTEwIDQ0IC0zMTkgOTggLTQ0NyAxMTQgLTEwMCAxMyAtMTQ2IDggLTExOCAtMTEgMTIgLTggMTAgLTkgLTcKLTQgLTEyIDMgLTI1IDEgLTI5IC02IC00IC04IC0zIC05IDQgLTUgOCA1IDEwIDEgNiAtOSAtNSAtMTIgLTEwIC0xMyAtMTcgLTYKLTYgNiAtMjAgMTEgLTMxIDExIC0xMyAwIC0xIDEwIDI5IDI0IDcwIDMyIDg1IDU5IDg1IDE0NyAwIDY1IDQgODAgNDMgMTU2IDQxCjgyIDQyIDgzIDcyIDc2IDc0IC0xOSAxOTUgMSAxOTUgMzIgMCAxOCAtODcgMTEzIC0xMTEgMTIwIC0xOCA2IC0xNCAxMyAzNSA2NQo2OCA3NCAxMDYgMTUxIDExMyAyMjcgNSA1OSAtOCAxMTMgLTI3IDExMyAtNSAwIC0xMCAtMTQgLTEwIC0zMCAwIC03OCAtODYKLTE1OCAtMjIyIC0yMDYgLTM1IC0xMiAtNDIgLTExIC03OCA3IC05MyA0OSAtMjQ3IDQ4IC0zNDEgMCBsLTQwIC0yMSAtNjIgMjEKYy0xMjMgNDEgLTIwMCAxMTAgLTIxMyAxOTIgLTkgNTAgLTIxIDQ3IC0yOSAtNyAtMTQgLTg5IDM2IC0yMTYgMTIxIC0zMDYgbDQyCi00NSAtMzggLTIzIGMtNDkgLTI4IC0xMDUgLTEwNSAtODcgLTEyMCAzOCAtMzAgMTUwIC00MCAyMDcgLTE4IDExIDQgMjggLTE5CjY0IC04OCA0NyAtOTIgNDggLTk2IDQxIC0xNTUgLTYgLTQ5IC00IC02NyA5IC04NiAyMSAtMzIgNzYgLTU5IDE1NCAtNzUgNTcKLTEyIDYzIC0xNSA1OCAtMzQgLTMgLTEyIC02IC02OSAtNiAtMTI4IDAgLTEwNCAtMSAtMTA4IC0yMiAtMTA4IC0yMSAwIC0yMSAyCi0xNSAxMzAgbDYgMTMwIC0zMCAwIGMtMTYgMCAtNDYgNyAtNjcgMTYgLTM2IDE1IC0zOCAxNSAtNTkgLTEwIC0yNSAtMjkgLTQxCi0zMyAtNDkgLTExIC0xNiA0MSAtNzggMCAtNzIgLTQ3IDMgLTE1IDEgLTI4IC00IC0yOCAtNCAwIC04IDYgLTggMTMgMCAxNgotNDIgNTcgLTU4IDU3IC02IDAgLTE0IDUgLTE3IDExIC00IDYgLTEgOSA2IDggOCAtMiA0MSAxIDc0IDYgMzMgNSA3NiA5IDk1CjExIDE5IDEgMzkgMyA0MyAzIDUgMSA1IDYgMSAxMiAtMTYgMjYgLTMxNyAtMjkgLTQ5NCAtOTAgLTkzIC0zMiAtMjYyIC0xMDMKLTI3OCAtMTE3IC0zIC0yIDE2MiAtMzE4IDE3MyAtMzMyIDEgLTEgMzcgMTQgNzkgMzQgMjkwIDEzNCA2MjEgMTc0IDkzMSAxMTMKMTIwIC0yNCAyODAgLTc2IDM2NSAtMTE5IDM1IC0xNyA2NiAtMjggNzAgLTIzIDExIDEyIDE3MCAzMTQgMTcwIDMyMiAwIDQgLTEyCjEzIC0yNiAyMCBsLTI3IDEyIDIzIDI0IGMxMyAxNCAyOSAyNSAzNyAyNSA3IDAgMTMgNSAxMyAxMSAwIDYgLTggOCAtMTcgNQotMTAgLTMgLTMxIC04IC00NiAtMTIgLTIyIC01IC0yNyAtMTEgLTI0IC0yNiA0IC0xNCAyIC0xOCAtMTAgLTE0IC04IDMgLTE3IDYKLTIwIDYgLTIgMCA3IDE0IDIxIDMxIDE0IDE3IDI2IDM1IDI2IDQwIDAgNSAxMCA5IDIyIDkgMTIgMCAzNyAxNyA1OCA0MCAzOQo0MiAzMSA1MSAtMjAgMjUgLTM0IC0xNyAtMzUgLTE2IC0xOCAyMCA2IDE0IDE5IDI1IDI5IDI1IDExIDAgMjYgMTUgMzggMzkgMTEKMjEgMjggNDEgMzcgNDUgOSA0IDE0IDkgMTEgMTIgLTMgMyAtMjQgLTQgLTQ3IC0xNiAtMzcgLTE5IC00MiAtMTkgLTM2IC01IDMKOSA2IDIwIDYgMjQgMCA0IDExIDEzIDI0IDE5IDE1IDYgMjcgMjMgMzEgNDEgNCAxNyAxNiAzOCAyOCA0NiAxMyA5IDE2IDE1IDgKMTUgLTggMCAtMzAgLTEyIC00OSAtMjcgbC0zNSAtMjYgNyAyOCBjNCAxNiAxNiAzNSAyNiA0MiAxMCA3IDIyIDI4IDI1IDQ2IDQKMTcgMTQgNDAgMjMgNTAgMjYgMzAgMCAxOSAtMzUgLTE1IGwtMzMgLTMyIDAgMzIgYzAgMjEgNiAzNSAyMCA0MiAxNCA3IDIwIDIxCjIwIDQzIDAgMTggNyA0MyAxNiA1NSAyNiAzNyAtMiAyNSAtMzUgLTE1IGwtMzAgLTM4IC0xIDMxIGMwIDE3IDcgMzcgMTUgNDQgOQo3IDE1IDI5IDE1IDU0IDAgMjMgNSA0NyAxMiA1NCA2IDYgOSAxNCA2IDE4IC00IDMgLTE5IC0xMyAtMzQgLTM2IGwtMjggLTQyCi04IDI4IGMtNSAxNyAtMyAzMyA1IDQyIDkgMTIgMTggMTIyIDEwIDEyMiAtOSAwIC0zMyAtNjQgLTI2IC02OSAxNCAtMTAgMTIKLTQxIC00IC00MSAtMTAgMCAtMTIgNiAtOCAyMCAzIDExIDIgMjAgLTMgMjAgLTE1IDAgLTIyIDQxIC0xMCA2MCA4IDEyIDggMjkKMSA1NyAtNiAyNSAtNyA0NyAtMSA1NyA2IDEwIDUgMTYgLTEgMTYgLTYgMCAtMTYgLTE4IC0yMiAtNDAgLTcgLTIyIC0xNiAtNDAKLTIxIC00MCAtOSAwIC0xMCA2IC0xNCA2NSAtMyA1NyAtMTggMTIyIC0yNiAxMTAgLTMgLTUgLTkgLTI1IC0xMyAtNDQgLTcgLTMzCi04IC0zNCAtMjIgLTE1IC03IDEwIC0xMSAyOSAtOCA0MSAzIDEzIC00IDM2IC0xNiA1NyAtMTIgMjAgLTE4IDQzIC0xNSA1MSAzCjggMiAxNSAtMyAxNSAtMTUgMCAtMTggLTcxIC00IC04NSA3IC04IDEzIC0yMCAxMyAtMjcgMCAtNyAtMTQgMyAtMzAgMjIgLTE2CjE5IC0zMCA0NiAtMzAgNjAgMCAxNCAtOSAzNiAtMjAgNTAgLTExIDE0IC0yMCAzNCAtMjAgNDUgMCAxMyAtMyAxNiAtMTEgOAotMTIgLTEyIC0xIC04NiAxMSAtNzggMTAgNiAyNSAtMTQgMTYgLTIyIC0xMSAtMTEgLTcxIDUyIC02OCA3MSAyIDEwIC05IDMyCi0yNiA1MCAtMTYgMTcgLTMyIDM4IC0zNSA0NiAtMyA5IC02IDQgLTYgLTEyIC0xIC0zNSA4IC01OCAyNCAtNTggNyAwIDE1IC03CjE4IC0xNCA0IC0xMSAxIC0xMyAtMTEgLTkgLTMzIDEyIC02NiA0NCAtNjcgNjUgLTEgMTEgLTE0IDMwIC0yOSA0MSAtMTUgMTEKLTMyIDI5IC0zNyA0MSAtOCAxOCAtOSAxNiAtNiAtOXogbTQ1IC02NyBjMTEgLTE0IDEwIC0xNiAtNSAtMTQgLTEwIDIgLTE3IDYKLTE1IDkgMSA0IDIgMTIgMiAxOSAwIDYgMSA5IDMgNyAxIC0yIDggLTEyIDE1IC0yMXogbTM1NyAtMzE4IGMzIC01IDIgLTEwIC00Ci0xMCAtNSAwIC0xMyA1IC0xNiAxMCAtMyA2IC0yIDEwIDQgMTAgNSAwIDEzIC00IDE2IC0xMHogbS0zMTEgLTUyIGMtMyAtNDcKLTcgLTU4IC0zMyAtMTA4IC0yMiAtNDMgLTk3IC0xNDEgLTExMyAtMTQ4IC0yMCAtOSAtNCAtNDMgMzIgLTcyIDIyIC0xNyA0MAotMzggNDAgLTQ2IDAgLTkgNSAtMTIgMTAgLTkgNiAzIDEwIC0yIDEwIC0xMyAwIC0yOSAtNTggLTQzIC0xMzAgLTMwIC02OSAxMwotNjggMTQgLTEyMyAtOTEgLTMzIC02MiAtMzkgLTg2IC00MyAtMTQ3IC02IC0xMjUgLTUwIC0xNzEgLTE1MSAtMTU5IC05NSAxMQotMTE5IDM4IC0xMjAgMTM3IC0xIDY3IC01IDg0IC0zMyAxMzUgLTE4IDMyIC00MSA3MyAtNTEgOTIgLTIyIDQxIC0zOCA1MiAtNTgKNDIgLTkgLTUgLTQ2IC05IC04MiAtMTAgLTEwOSAtNCAtMTEyIDM1IC05IDExMCBsNDAgMjkgLTU0IDczIGMtNjEgODIgLTkzCjE0MCAtMTAxIDE4NyBsLTYgMzIgNDQgLTQ1IGM0NyAtNDcgMTIzIC04OSAxOTggLTEwOCA0MyAtMTIgNTEgLTExIDEwNSAxNSA1MAoyNCA3MiAyOCAxNDcgMjggNzggMCA5NSAtMyAxNDggLTI5IDMzIC0xNyA2MiAtMjYgNjUgLTIxIDMgNCAxNCA4IDI0IDggNTcgMAoxOTUgOTMgMjI2IDE1MSAxOSAzNyAyMSAzNiAxOCAtM3ogbTM2NiAtNTQgYzAgLTggLTUgLTEyIC0xMCAtOSAtNiA0IC04IDExCi01IDE2IDkgMTQgMTUgMTEgMTUgLTd6IG04NiAtMjMxIGMtMTAgLTEwIC0xOSA1IC0xMCAxOCA2IDExIDggMTEgMTIgMCAyIC03CjEgLTE1IC0yIC0xOHogbTI0IC0xMTMgYzAgLTUgLTQgLTEwIC0xMCAtMTAgLTUgMCAtMTAgNSAtMTAgMTAgMCA2IDUgMTAgMTAKMTAgNiAwIDEwIC00IDEwIC0xMHogbS03MDUgLTQ0NiBjMjIgLTQgNTIgLTggNjggLTggMzEgLTEgMzUgLTExIDkgLTI1IC0xMAotNSAtMzEgLTQyIC00NiAtODAgLTE1IC0zOSAtMjkgLTcxIC0zMSAtNzEgLTIgMCAtMiAzMCAtMSA2OCA1IDEwMCAwIDExMiAtMzkKMTA5IC0xOCAtMSAtMzEgLTUgLTI4IC05IDYgLTExIC01IC0xMCAtMjggMyAtMjggMTUgLTEzIDMwIDI0IDI0IDE4IC0yIDUwIC04CjcyIC0xMXogbS0zMDMgLTMxIGMyNSAtMjMgMjQgLTczIC0xIC03MyAtMTMgMCAtMjEgOCAtMjMgMjIgLTIgMTMgLTExIDI0IC0yMQoyNiAtMTYgMyAtMTggLTQgLTE1IC04NSAzIC04MCA1IC04OCAyMyAtODggMTUgMCAyMSA4IDIzIDMzIDIgMjQgLTEgMzIgLTEyCjMyIC05IDAgLTE2IDkgLTE2IDIwIDAgMTYgNyAyMCAzNSAyMCBsMzUgMCAwIC01MyBjMCAtNjQgLTIwIC05NyAtNTggLTk3IC0xNQowIC0zMyA0IC00MCA5IC0xOSAxMSAtMzEgNzQgLTMyIDE1MyAwIDU4IDMgNjkgMjIgODIgMjkgMjEgNTcgMjAgODAgLTF6IG0xODUKOSBjMTQgLTkgMzIgLTgyIDMzIC0xMjkgMCAtMTggNSAtMzMgMTAgLTMzIDYgMCAxMCAyMiAxMCA0OSAwIDc4IDEwIDExMSAzMgoxMTEgMTcgMCAxOSAtNSAxNCAtMzIgLTcgLTQwIC0yMSAtMjEwIC0xOCAtMjIwIDEgLTUgLTkgLTggLTIyIC04IC0yMiAwIC0yNgo2IC0zNiA1OCAtNiAzMSAtMTUgNzEgLTIwIDg3IGwtOCAzMCAtMSAtMzYgYy0xIC0yMCAtNCAtNTcgLTcgLTgzIC02IC0zNyAtMTEKLTQ2IC0yNyAtNDYgLTE3IDAgLTE5IDUgLTE0IDM4IDQgMjAgOSA3OSAxMyAxMzAgNyA5MCAxMyAxMDIgNDEgODR6IG03MzggLTIKYy0zIC01IC0xMSAtMTAgLTE2IC0xMCAtNiAwIC03IDUgLTQgMTAgMyA2IDExIDEwIDE2IDEwIDYgMCA3IC00IDQgLTEwegptLTEyNTEgLTkgYy00NSAtMTEgLTU0IC0xOSAtNTQgLTQ3IDAgLTE2IC01IC0yNCAtMTIgLTIxIC03IDIgLTEyIDkgLTExIDE0IDEKNSAtMyAxMCAtMTAgMTEgLTcgMSAtMjQgNCAtMzkgOCAtMjEgNSAtMzMgMCAtNjEgLTI3IGwtMzUgLTMzIDE5IC02NSBjMzYKLTEyOCA0NyAtMTQ5IDg1IC0xNjEgMjcgLTkgNDIgLTkgNjQgMCAxNyA3IDI4IDE2IDI1IDIwIC02IDEwIDE2IDE5IDMyIDEyIDcKLTIgMTAgLTggNyAtMTMgLTMgLTUgMCAtOSA1IC05IDYgMCAxMSA1IDExIDEwIDAgNiA3IDEwIDE1IDEwIDcgMCAxOSA4IDI0IDE4CjYgOSAxMSAxMiAxMSA1IDAgLTcgMTIgLTkgMzMgLTcgMTcgMiA0NiA0IDY0IDQgMjIgMCAzNiA3IDQ3IDIyIDE0IDE5IDE5IDE5CjE4IC0yIDAgLTMgMTkgLTYgNDIgLTggMzAgLTIgNDcgMyA2MiAxNyAyMCAxOCAyMSAxOCAzMiAwIDEzIC0yMSA0NyAtMjUgNTgKLTggNCA4IDkgOCAxNyAwIDE2IC0xNiA1NyAtMTMgNjQgNCA1IDEzIDggMTIgMjAgLTUgMTAgLTE0IDI0IC0yMCA0MiAtMTkgMTQKMiAzNiAtMSA0OCAtNSAxMiAtNCAzMSAtMiA0MyA0IDE2IDkgMjIgOCAyNiAtNSAzIC04IDEzIC0xNSAyMSAtMTUgOCAwIDEyIC00CjkgLTkgLTcgLTExIDEzIC05IDMzIDMgOSA2IDEyIDUgOCAtMSAtNCAtNyAxMiAtMTYgMzggLTI0IDI1IC03IDQ1IC0xNiA0NQotMjAgMCAtMTcgNDMgNiA1MyAyOSAxMCAyMSA4IDI3IC0xNiA0NiAtMjQgMTkgLTQwIDU1IC0xOCA0MiA0IC0zIDYgNiAzIDIxCi00IDE5IC0yIDI0IDggMTggOSAtNSAxMSAtNCA2IDMgLTQgNiAwIDM2IDkgNjcgMTQgNDcgMTQgNTggMyA3NCAtMTIgMTcgLTE3CjE4IC0zNyA4IC0xNyAtOSAtMzEgLTM1IC01MSAtOTcgbC0yOCAtODUgMSA5MCBjMSA5MSAtNSAxMTcgLTMzIDEyOSAtOCAzIDcgMwozNSAwIDgyIC0xMCAyOTAgLTcwIDM1MSAtMTAyIDEwIC01IDMwIC0xNSA0NCAtMjEgMTQgLTcgMzQgLTE5IDQ1IC0yNyAxOSAtMTQKMTkgLTE1IC0xMCAtNzQgLTE3IC0zMyAtMzMgLTYwIC0zNyAtNjAgLTUgMCAtOCAtNyAtOCAtMTYgMCAtOSAtNSAtMTIgLTEyIC04Ci02IDQgLTggMyAtNCAtNCA2IC0xMCAtNDcgLTEyNiAtNjIgLTEzNiAtNCAtMiAtNTAgMTMgLTEwMiAzNSAtNTIgMjEgLTEwMyAzOQotMTEyIDM5IC05IDAgLTIzIDYgLTMwIDEzIC03IDYgLTIyIDEzIC0zMyAxNCAtMTEgMCAtNjUgMTEgLTEyMCAyMyAtNTUgMTEKLTEyMiAyNCAtMTUwIDI3IC02NyA3IC0yNzkgOCAtMzM1IDEgLTE1OSAtMjEgLTM2NiAtNzggLTQ3NiAtMTMwIC0zOCAtMTggLTY5Ci0yNyAtNzQgLTIyIC0yMCAyMiAtMTMxIDI0NSAtMTI1IDI1NCAzIDUgLTEgMTAgLTkgMTAgLTI1IDAgLTE4IDI0IDExIDQyIDU2CjMyIDIyNCA5NyAzMDUgMTE3IDExNCAyOCAxMTggMjkgMTU4IDI5IGwzNSAwIC0zMSAtN3ogbTE3NiAtMyBjMCAtNyA3IC02MCAxNQotMTE4IDE4IC0xMzQgMTkgLTEzMCAtNSAtMTMwIC0xMSAwIC0yMCA2IC0yMCAxMyAwIDYgLTcgNTkgLTE1IDExNyAtMTggMTM0Ci0xOSAxMzAgNSAxMzAgMTEgMCAyMCAtNiAyMCAtMTJ6IG0tMTA4IC0yMCBjMjMgLTE4IDQyIC05NiAyOSAtMTEyIC04IC05IC00Ci0yNyAxNCAtNjQgMzAgLTYzIDMwIC02MiA0IC02MiAtMTQgMCAtMjYgMTMgLTQwIDQ2IC0yMSA0NyAtNDcgNTYgLTQwIDEzIDkKLTUwIDYgLTczIC05IC03NyAtMTMgLTIgLTIwIDIxIC0zOCAxMTEgLTI5IDE0NyAtMjkgMTQ1IDExIDE1MCAxNyAyIDM3IDUgNDMKNSA1IDEgMTcgLTQgMjYgLTEweiBtNjkzIC0yIGMwIC0xIC0xIC01OSAtMyAtMTI5IC0zIC0xMjUgLTQgLTEyOCAtMjUgLTEyNQotMTggMiAtMjEgOCAtMTkgMzYgMyAyNyAwIDMyIC0xNyAzMiAtMTQgMCAtMjUgLTkgLTMxIC0yNSAtNiAtMTYgLTE3IC0yNSAtMzEKLTI1IC0xMyAwIC0xOSA1IC0xNyAxMyA4NSAyMjYgOTAgMjM3IDExNyAyMzAgMTQgLTMgMjYgLTYgMjYgLTd6IG0tODU3IC00MwpjMjEgLTE4IDYyIC0xNDAgNjIgLTE4MyAwIC0yOSAtMjcgLTYwIC01MiAtNjAgLTQxIDAgLTU3IDIwIC04MyAxMDMgLTMwIDEwMAotMzEgMTExIC01IDEzNyAyNSAyNSA1MSAyNSA3OCAzeiBtOTgyIDUgYzAgLTcgLTE0IC01NiAtMzAgLTEwOCAtMTcgLTUxIC0zMAotOTUgLTMwIC05NiAwIC0xIDE0IC01IDMwIC05IDIxIC01IDMwIC0xMyAzMCAtMjYgMCAtMjMgLTQgLTIzIC02NCAtMyAtMzcgMTMKLTQ2IDIwIC00MSAzMyA0IDkgMjEgNjIgMzggMTE5IDI1IDgwIDM1IDEwMiA0OSAxMDIgMTAgMCAxOCAtNiAxOCAtMTJ6IG0tNzYzCi00MCBjLTMgLTcgLTUgLTIgLTUgMTIgMCAxNCAyIDE5IDUgMTMgMiAtNyAyIC0xOSAwIC0yNXogbS0xNzAgMCBjLTMgLTggLTYKLTUgLTYgNiAtMSAxMSAyIDE3IDUgMTMgMyAtMyA0IC0xMiAxIC0xOXogbTE3OSAtMzMgYy0zIC0yMCAtMTYgLTMxIC0xNiAtMTMKMCAxMyA4IDI4IDE2IDI4IDEgMCAxIC03IDAgLTE1eiIvPgo8cGF0aCBkPSJNMTczNCA1MDUgYy0yOCAtMjggLTMwIC0zMiAtMTggLTY1IDExIC0zMiAxNSAtMzUgNTMgLTM3IDMyIC0yIDQzIDEKNDcgMTUgMyA5IDExIDI4IDE3IDQxIDkgMTkgOSAyNSAtMSAyOSAtNyAyIC0xOCA5IC0yNSAxNSAtMzQgMzMgLTQyIDMzIC03MyAyegptNTAgLTEwIGMzIC04IDE2IC0xNSAyOCAtMTUgMjIgLTEgMjIgLTEgNCAtMTUgLTEyIC05IC0xNyAtMjIgLTEzIC0zNSA2IC0yMgotMyAtMjYgLTIxIC04IC05IDkgLTE1IDkgLTI0IDAgLTE4IC0xOCAtMjcgLTE1IC0yMSA4IDMgMTEgMCAyNyAtNyAzNSAtMTAgMTMKLTkgMTUgOSAxNSAxMiAwIDIxIDYgMjEgMTUgMCA4IDQgMTUgOSAxNSA1IDAgMTEgLTcgMTUgLTE1eiIvPgo8cGF0aCBkPSJNMzgwIDUwMiBjLTI5IC0yNiAtMzEgLTMxIC0yMCAtNTMgNyAtMTMgMTYgLTMxIDIwIC0zOSA0IC04IDEwIC0xNAoxNCAtMTIgMyAxIDIyIDIgNDEgMiAzMCAwIDM1IDMgMzUgMjMgMCAxMyA1IDI4IDEwIDMzIDEzIDEzIDIgNDQgLTE1IDQ0IC03IDAKLTE4IDcgLTI1IDE1IC0xNyAyMCAtMjIgMTkgLTYwIC0xM3ogbTU0IC03IGMzIC04IDE2IC0xNSAyOCAtMTUgMjIgLTEgMjIgLTEKNSAtMTUgLTEzIC05IC0xNyAtMjAgLTEyIC0zNCA3IC0yMyAtNCAtMjggLTIzIC05IC04IDggLTE1IDggLTI4IC0yIC0xNCAtMTIKLTE2IC0xMiAtMTIgNiAxIDEyIC0zIDI4IC0xMSAzNyAtMTIgMTUgLTExIDE3IDggMTcgMTIgMCAyMSA2IDIxIDE1IDAgOCA0IDE1CjkgMTUgNSAwIDExIC03IDE1IC0xNXoiLz4KPHBhdGggIGQ9Ik03NDMgNjQzIGMtMTMgLTUgLTcgLTYxIDggLTc4IDE3IC0xOCAzOSAxOCAzMSA0OSAtOCAzMSAtMTggMzggLTM5CjI5eiIvPgo8cGF0aCBkPSJNMTQzMSA1ODQgYy0xNCAtNTIgLTE0IC01OCAtMyAtNjIgMTAgLTMgMjcgODYgMTggOTUgLTIgMyAtOSAtMTIKLTE1IC0zM3oiLz4KPHBhdGggZD0iTTU3NCA1OTYgYy0xMCAtMjUgMzggLTE2MCA1OSAtMTY0IDIzIC01IDIxIDI2IC02IDEwNyAtMjIgNjUgLTQyIDg2Ci01MyA1N3oiLz4KPHBhdGggZD0iTTk4MCAxOTgzIGMtMjMxIC0zNiAtNDU4IC0xNjYgLTU4NCAtMzM0IC0xMzMgLTE3NyAtMTg4IC0zNDAgLTE4OAotNTU5IDAgLTkwIDYgLTEzNiAyNSAtMjEwIDI1IC05NSA2MiAtMTg4IDkwIC0yMjUgMjkgLTM4IDI1IC0xMCAtOCA1OCAtMTkgMzcKLTMxIDY3IC0yOCA2NyAzIDAgMSA2IC01IDEzIC02IDcgLTIwIDUzIC0zMyAxMDIgLTM4IDE1NiAtMjEgMzk4IDM2IDUxNyAxNAoyOCAyNSA1NyAyNSA2NCAwIDcgMTAgMjMgMjIgMzUgMTMgMTIgMTYgMTggOCAxNCAtMTMgLTcgLTEzIC02IDAgMTEgOSAxMCAyMgozMSAzMCA0NyA3IDE1IDM5IDU1IDcxIDg4IDMxIDMzIDU3IDYzIDU4IDY2IDEgMjQgMjc5IDE4MyAzMjAgMTgzIDkgMCAyMSA0CjI3IDkgOSAxMCAzMiAxNSAxNDkgMzAgMTI1IDE3IDI5MyAtMiA0MTUgLTQ3IDQ5IC0xOCAxNzMgLTg1IDE5MCAtMTAyIDMgLTMKMjggLTIzIDU1IC00NCA2MCAtNDcgNzAgLTU4IDExNSAtMTE2IDE5IC0yNSAzNyAtNDcgNDAgLTUwIDUgLTUgMTIgLTE3IDU4Ci05OSA0MCAtNzMgNTggLTExOSA2OCAtMTc5IDMgLTE1IDggLTM2IDExIC00NyAxNiAtNDggMjIgLTIyNyAxMSAtMzE1IC05IC03MQotNDggLTE5MCAtODcgLTI2MiAtMTcgLTMzIC0yNiAtNjAgLTIwIC02NCAxNCAtOCA4NCAxNDcgMTEwIDI0NiAyOSAxMDkgMzIKMzA4IDYgNDE0IC03MyAyOTMgLTI3NCA1MjYgLTU1MCA2MzUgLTEyNCA0OSAtMzE3IDczIC00MzcgNTR6Ii8+CjxwYXRoIGQ9Ik0xMDEwIDE3NTAgYy0xNCAtNCAtMzkgLTggLTU3IC05IC0xOCAtMSAtNTggLTEyIC05MCAtMjcgLTMyIC0xNAotNTggLTI0IC01OCAtMjMgMCA2IC0xMjIgLTc3IC0xMzIgLTkwIC0yMSAtMjkgLTUgLTI0IDQ1IDEzIDIyNSAxNjUgNTIzIDE2NQo3NTUgLTEgMjcgLTE5IDUxIC0zMyA1MyAtMzAgNiA2IC0zMiA0NyAtNDQgNDcgLTYgMCAtMTUgNiAtMTkgMTMgLTEwIDE2IC0xMzEKNzcgLTE1MiA3NyAtMTAgMCAtMjEgNCAtMjYgOSAtMjEgMjAgLTIyOSAzNiAtMjc1IDIxeiIvPgo8cGF0aCBkPSJNNzkxIDE2MTYgYy03IC04IC0xMSAtMzQgLTkgLTU4IDIgLTM1IDcgLTQzIDIzIC00MyAxNCAwIDIxIDcgMjIgMjUKMSAxNCAwIDE4IC0zIDggLTEwIC0zMyAtMjQgLTE4IC0yNCAyNSAxIDM4IDIgNDAgMTQgMjQgOCAtMTAgMTcgLTE0IDIwIC04IDMKNSAtMSAxNyAtMTAgMjUgLTE5IDE5IC0xOSAxOSAtMzMgMnoiLz4KPHBhdGggZD0iTTg2MiAxNjA5IGMtMTUgLTM5IC0yMSAtOTkgLTExIC05OSA1IDAgOSA3IDkgMTUgMCA4IDUgMTUgMTAgMTUgNiAwCjEwIC03IDEwIC0xNSAwIC04IDUgLTE1IDExIC0xNSA3IDAgOSAxNyA0IDUzIC04IDYyIC0yMSA4MCAtMzMgNDZ6IG0xNSAtNTEKYy0zIC03IC01IC0yIC01IDEyIDAgMTQgMiAxOSA1IDEzIDIgLTcgMiAtMTkgMCAtMjV6Ii8+CjxwYXRoIGQ9Ik05MTggMTYyMiBjLTIgLTQgLTEgLTMyIDMgLTYyIDMgLTMwIDYgLTQyIDcgLTI3IDIgMzEgMjIgMjggMjIgLTQgMAotMTAgNCAtMTkgOSAtMTkgNCAwIDggMjMgNyA1MSAtMSA0NCAtNCA1MyAtMjMgNjAgLTEyIDQgLTI0IDUgLTI1IDF6IG0zMiAtMzIKYzAgLTExIC00IC0yMCAtMTAgLTIwIC01IDAgLTEwIDkgLTEwIDIwIDAgMTEgNSAyMCAxMCAyMCA2IDAgMTAgLTkgMTAgLTIweiIvPgo8cGF0aCBkPSJNOTg4IDE2MjMgYy0yIC00IC0xIC0zMyAyIC02MyBsNSAtNTUgNyA1NSBjNCAzMCA0IDU4IC0xIDYzIC01IDUKLTEwIDUgLTEzIDB6Ii8+CjxwYXRoIGQ9Ik0xMDMyIDE1OTUgYy0yIC0zMSAtNSAtMzcgLTEzIC0yNSAtNyAxMSAtOCA2IC0zIC0yMCAxMyAtNjkgMjYgLTUzCjIxIDI2IC0yIDQzIC00IDQ4IC01IDE5eiIvPgo8cGF0aCBkPSJNMTA2MCAxNTcyIGMwIC0zNyA0IC02MiAxMSAtNjIgNiAwIDkgMjAgNiA1NSAtNSA3NyAtMTcgODEgLTE3IDd6Ii8+CjxwYXRoIGQ9Ik0xMDk1IDE1ODkgYzkgLTYxIDE1IC03OSAyNSAtNzkgMTAgMCAxNiAxOCAyNSA3OSA1IDMxIDQgNDIgLTQgMzcKLTYgLTQgLTExIC0yMyAtMTEgLTQyIDAgLTE5IC00IC0zNCAtMTAgLTM0IC01IDAgLTEwIDE1IC0xMCAzNCAwIDE5IC01IDM4Ci0xMSA0MiAtOCA1IC05IC02IC00IC0zN3oiLz4KPHBhdGggZD0iTTExNzIgMTYxOCBjLTE3IC0xNyAtMTUgLTgzIDMgLTk4IDI0IC0yMCAzNyAxIDMzIDU1IC0zIDUwIC0xNSA2NAotMzYgNDN6IG0yOCAtNDggYzAgLTIyIC00IC00MCAtMTAgLTQwIC01IDAgLTEwIDE4IC0xMCA0MCAwIDIyIDUgNDAgMTAgNDAgNgowIDEwIC0xOCAxMCAtNDB6Ii8+CjxwYXRoIGQ9Ik0xMjMwIDE1NjkgYzAgLTM3IDQgLTU5IDExIC01OSA2IDAgOSA5IDYgMjAgLTMgMTEgLTIgMjIgMyAyNSA0IDMKMTEgLTYgMTQgLTIwIDQgLTE0IDExIC0yNSAxNyAtMjUgNiAwIDcgNSAzIDEyIC00IDYgLTYgMzAgLTYgNTMgMiAzOCAtMSA0MwotMjMgNDcgLTI0IDUgLTI1IDQgLTI1IC01M3ogbTMyIDkgYy05IC05IC0xMiAtNyAtMTIgMTIgMCAxOSAzIDIxIDEyIDEyIDkgLTkKOSAtMTUgMCAtMjR6Ii8+CjxwYXRoIGQ9Ik0xMzAwIDE1NjggYzAgLTU1IDEgLTU4IDI1IC01OCAxNCAwIDI1IDUgMjUgMTAgMCA2IC03IDEwIC0xNSAxMAotMTggMCAtMjAgMjYgLTIgMzQgMTAgNSAxMCA3IDAgMTIgLTE5IDggLTE2IDM0IDQgMzQgMjIgMCA4IDEzIC0xNyAxNSAtMTggMQotMjAgLTUgLTIwIC01N3oiLz4KPHBhdGggZD0iTTEzNzEgMTYxNyBjLTE2IC0xNiAtMTQgLTI4IDExIC01NCAyNCAtMjYgMTggLTQ0IC04IC0yMiAtMTQgMTIgLTE2CjExIC0xMyAtNiA2IC0yNyA0MyAtMjYgNDcgMSAyIDExIC00IDI3IC0xMyAzNCAtOCA3IC0xNSAxOSAtMTUgMjcgMCAxMyAzIDEzCjE1IDMgMTIgLTEwIDE1IC0xMCAxNSAzIDAgMTkgLTI0IDI5IC0zOSAxNHoiLz4KPHBhdGggZD0iTTUzNyAxNDQ2IGMtMjAgLTMwIC00NiAtODUgLTU4IC0xMjMgLTEyIC0zNyAtMjQgLTcyIC0yOCAtNzggLTcgLTEyCi04IC0yMSAtMTEgLTE1NSAtMiAtNjYgMSAtMTEzIDggLTEyNyA3IC0xMiAxMiAtMzEgMTIgLTQyIDAgLTEyIDQgLTI5IDggLTM5CjUgLTkgMjEgLTQyIDM2IC03NCAxNSAtMzEgMzcgLTY1IDQ4IC03NSAyNSAtMjEgMjQgLTE5IC0yNCA3MyAtNTEgOTkgLTcwIDE4MAotNjkgMjk0IDEgMTM0IDMyIDIzOCAxMDYgMzU4IDM4IDYyIDE0IDUxIC0yOCAtMTJ6Ii8+CjxwYXRoIGQ9Ik0xNjEwIDE0ODkgYzAgLTYgOCAtMjMgMTkgLTM3IDMxIC00NCA2NyAtMTIzIDg2IC0xODcgMjkgLTk1IDI1Ci0yNTggLTggLTM2MCAtMTUgLTQ0IC00MCAtMTAyIC01NyAtMTI5IC0xNyAtMjYgLTI4IC01MSAtMjUgLTU0IDYgLTcgNDYgMzQKNDkgNTEgMSA3IDggMjIgMTUgMzUgMzggNzAgNzMgMjI0IDY2IDI5NyAtMTEgMTI1IC0xOSAxNjQgLTQ1IDIyOCAtMTYgMzcgLTI2CjY3IC0yMiA2NyA0IDAgMiA0IC00IDggLTYgNCAtMjMgMjYgLTM4IDUwIC0yNyA0MyAtMzYgNTEgLTM2IDMxeiIvPgo8cGF0aCBkPSJNMzU1IDEzNDggYy00IC0xMCAtMTYgLTE4IC0yNiAtMTggLTIxIDAgLTI2IC0xNiAtOCAtMjIgOSAtMyA5IC0xMAowIC0yNiAtMTIgLTIyIDEgLTMyIDE0IC0xMSA1IDcgMTQgNCAyNiAtNyAxOCAtMTYgMTkgLTE2IDE5IDUgMCAxMiA3IDI0IDE1CjI3IDIwIDggMTkgMjQgMCAyNCAtOSAwIC0yMCAxMCAtMjQgMjMgLTggMTkgLTEwIDIwIC0xNiA1eiBtMTUgLTQzIGMwIC04IC03Ci0xNSAtMTUgLTE1IC0xNiAwIC0yMCAxMiAtOCAyMyAxMSAxMiAyMyA4IDIzIC04eiIvPgo8cGF0aCBkPSJNMTgzMCAxMzQzIGMwIC0xNiAtNiAtMjMgLTIwIC0yMyAtMjMgMCAtMjcgLTE1IC01IC0yNCA4IC0zIDE1IC0xNQoxNSAtMjcgMCAtMjAgMSAtMjEgMTggLTYgMTIgMTEgMjIgMTMgMzUgNiAxOSAtMTEgMjMgMSA1IDE5IC04IDggLTggMTUgMiAyNwoxMCAxMiAxMCAxNSAtNSAxNSAtMTAgMCAtMjQgOCAtMzEgMTggLTEyIDE2IC0xMyAxNSAtMTQgLTV6IG0yOCAtNDIgYzMgLTggLTEKLTEyIC05IC05IC03IDIgLTE1IDEwIC0xNyAxNyAtMyA4IDEgMTIgOSA5IDcgLTIgMTUgLTEwIDE3IC0xN3oiLz4KPHBhdGggZD0iTTMyNiAxMTUzIGMtNSAtMTYgLTE1IC0yMyAtMzIgLTIzIC0yOCAwIC0zMSAtMTIgLTggLTMxIDEwIC04IDEzCi0yMSA5IC0zNyAtNiAtMjQgLTUgLTI1IDE3IC0xMCAyMCAxNCAyNSAxNCA0NSAxIDIyIC0xNSAyMyAtMTUgMTcgMTYgLTUgMjMKLTIgMzIgMTAgMzcgMjQgOSAxOSAyNCAtNyAyNCAtMTUgMCAtMjggOCAtMzQgMjMgbC0xMCAyMiAtNyAtMjJ6IG0yOCAtNDEgYzIKLTQgMiAtMTMgLTIgLTE4IC05IC0xMyAtNDUgLTI3IC0zNyAtMTUgMyA1IDAgMTMgLTYgMTcgLTggNCAtNyA5IDIgMTUgMTggMTEKMzYgMTEgNDMgMXoiLz4KPHBhdGggZD0iTTE4NTYgMTE1MyBjLTUgLTE2IC0xNSAtMjMgLTMyIC0yMyAtMjcgMCAtMzIgLTE1IC04IC0yNCAxMiAtNSAxNQotMTQgMTAgLTM3IC02IC0zMSAtNSAtMzEgMTcgLTE2IDIwIDEzIDI1IDEzIDQ1IC0xIDIxIC0xNCAyMiAtMTQgMTYgMTUgLTQgMjIKLTIgMzIgMTAgMzYgMTYgNiAyMyAyOCA5IDI2IC0yNSAtNCAtNDEgNCAtNTAgMjQgbC0xMCAyMiAtNyAtMjJ6IG0yNyAtNTkgYy0zCi04IC0xMSAtMTQgLTE4IC0xNCAtMTggMCAtMjYgMjUgLTEyIDM5IDE0IDE0IDM4IC01IDMwIC0yNXoiLz4KPHBhdGggZD0iTTM0MCA5NDQgYzAgLTE0IC04IC0yNCAtMjIgLTI4IC0yMSAtNiAtMjEgLTcgLTUgLTE3IDkgLTUgMTcgLTE5IDE3Ci0zMSAwIC0xNyAzIC0xOCAxNSAtOCA4IDYgMjMgOSAzNSA1IDE5IC02IDIxIC01IDExIDEzIC03IDE0IC04IDIzIC0xIDI3IDE2CjEwIDEyIDI1IC02IDI1IC05IDAgLTIzIDggLTMwIDE4IC0xMiAxNiAtMTMgMTYgLTE0IC00eiBtMzAgLTQ1IGMwIC01IC03IC05Ci0xNSAtOSAtMTUgMCAtMjAgMTIgLTkgMjMgOCA4IDI0IC0xIDI0IC0xNHoiLz4KPHBhdGggZD0iTTE4MzcgOTM2IGMtNCAtOSAtMTQgLTEyIC0yOSAtOSAtMjIgNiAtMjIgNSAtNiAtMTMgMTIgLTE0IDE0IC0yNCA2Ci0zOCAtOSAtMTYgLTcgLTE3IDExIC0xMSAxMyA0IDI4IDEgMzYgLTUgMTIgLTEwIDE1IC05IDE1IDggMCAxMiA3IDI1IDE3IDMwCjE0IDkgMTQgMTAgLTUgMTYgLTEyIDQgLTIyIDE0IC0yMiAyMiAwIDE4IC0xNiAxOCAtMjMgMHogbTIzIC0zNyBjMCAtNSAtNyAtOQotMTUgLTkgLTE1IDAgLTIwIDEyIC05IDIzIDggOCAyNCAtMSAyNCAtMTR6Ii8+CjxwYXRoIGQ9Ik0xMjMgNDMxIGMtMzQgLTIwIC02MyAtMzggLTYzIC00MSAwIC0zIDI4IC0xNiA2MyAtMzAgbDYyIC0yNSAzIC03MwpjMiAtMzkgNSAtNzIgNyAtNzIgMiAwIDI4IDE0IDU3IDMyIDI5IDE4IDU0IDMzIDU2IDM0IDQgMiAtMTEyIDIxMyAtMTE4IDIxMwotMyAtMSAtMzMgLTE3IC02NyAtMzh6IG04MCAtMTggYzQgLTEwIDIyIC00NSA0MSAtNzggMzYgLTYzIDM1IC04NSAtNiAtODUKLTEyIDAgLTE3IC00IC0xMiAtMTIgNCAtNyAzIC04IC00IC00IC03IDQgLTEyIDI3IC0xMiA1MSAwIDQ3IC0xMiA2NiAtNjAgODcKLTMwIDEzIC00NCA0NiAtMTQgMzQgOCAtMyAxMiAtMiA5IDMgLTUgOSAxMiAxNyA0MSAyMCA3IDAgMTQgLTcgMTcgLTE2eiIvPgo8cGF0aCBkPSJNMTk0MiAzNjUgbC02MCAtMTA1IDUyIC0zMiBjMjggLTE4IDU0IC0zNCA1OCAtMzYgNCAtMiA4IDI5IDEwIDY4CmwzIDcyIDYyIDI2IGMzNSAxNSA2MyAzMCA2MyAzMyAwIDMgLTEwIDExIC0yMiAxNyAtMTMgNiAtNDIgMjIgLTY0IDM2IGwtNDEKMjYgLTYxIC0xMDV6IG0xMTYgNTIgYzIxIC0xNiAxMyAtMzYgLTIwIC01MCAtNDYgLTIwIC01NiAtMzYgLTU5IC05NCBsLTIgLTUxCi0yMyAxNiBjLTEzIDEwIC0yNCAyMSAtMjQgMjUgMCA1IC00IDUgLTEwIDIgLTUgLTMgLTEwIC0xIC0xMCA1IDAgNiA2IDEzIDE0CjE2IDggMyAxNiAxOSAyMCAzNiA0IDIxIDEwIDI4IDIwIDI1IDEwIC00IDEzIC0xIDEwIDcgLTMgNyA0IDI5IDE2IDQ5IDIxIDM2CjM2IDM5IDY4IDE0eiIvPgo8cGF0aCBkPSJNNzI0IDI4OSBjMTQ5IC03NyAzOTQgLTEwMiA1NzQgLTU5IDEwMSAyNCAyNDUgODMgMjE4IDg4IC0xMCAyIC0yOAotMSAtNDAgLTYgLTIxIC0xMCAtNTcgLTI0IC02NiAtMjYgLTMgLTEgLTEwIC00IC0xNiAtOCAtMTQgLTkgLTg2IC0yNyAtMTQ5Ci0zOCAtMTE3IC0yMCAtMzQ3IC01IC00MDcgMjYgLTE1IDggLTI4IDEyIC0yOCA5IDAgLTQgLTE1IDIgLTMyIDExIC02MSAzMQotNjggMzQgLTkwIDM0IC0xNiAtMSAtNiAtMTAgMzYgLTMxeiIvPgo8cGF0aCBkPSJNNjA3IDMwMyBjLTEzIC0xMiAtNyAtMjQgOSAtMjEgMTAgMiAxOSAtMyAyMSAtOSAzIC04IC00IC0xMyAtMTYKLTEzIC0xMiAwIC0yMSA1IC0yMSAxMCAwIDE1IC00MiAxMSAtNzAgLTYgLTE0IC05IC0xNyAtMTMgLTYgLTEwIDEwIDQgMzYgMQo1NyAtNiAyOCAtOCA0NiAtOCA2MiAtMSAxNyA4IDI5IDcgNDcgLTIgMjMgLTEyIDIzIC0xMiAtMTMgLTI0IC0xOSAtNyAtNDEKLTE5IC00OSAtMjggLTEyIC0xNCAtMTEgLTE1IDggLTUgMTUgOCAzMiA4IDU4IDEgMzEgLTkgNDEgLTggNTYgNiAxNSAxMyAyNQoxNSA0NyA4IGwyOCAtMTAgLTMxIC0xNiBjLTE3IC05IC0zNyAtMjMgLTQ1IC0zMyAtMTMgLTE2IC0xMiAtMTYgMTAgLTUgMTMgOAozOSAxMSA1OCA4IDI1IC00IDM4IC0xIDUxIDEzIDEyIDEzIDI2IDE3IDQ1IDEzIGwyOCAtNSAtNDEgLTMwIGMtMjIgLTE2IC00MAotMzUgLTQwIC00MCAwIC02IDggLTQgMTggNSAxMCAxMCAzNCAxNyA1MiAxNyAyMCAwIDQyIDggNTUgMjAgMTkgMTggMjggMjAgNjYKMTEgMjkgLTcgNTkgLTcgODggMCAzOCA5IDQ3IDcgNjYgLTExIDEzIC0xMiAzNSAtMjAgNTggLTIwIDIwIDAgMzkgLTUgNDIgLTEwCjMgLTYgMTIgLTEwIDE4IC0xMCA3IDEgLTUgMTYgLTI2IDM0IC0zNyAzMyAtMzcgMzQgLTEzIDM4IDE1IDMgMzEgLTEgNDAgLTEwCjEwIC0xMCAzMCAtMTUgNTcgLTE0IDIyIDIgNDcgLTIgNTUgLTkgOCAtNiAxNCAtNyAxNCAtMiAwIDUgLTE5IDIwIC00MiAzMwpsLTQyIDI0IDI4IDcgYzE5IDUgMzYgMyA1MCAtNiAxNyAtMTEgMzAgLTEyIDU1IC01IDIyIDYgNDAgNiA1MiAtMSAxMSAtNSAxOQotNiAxOSAtMSAwIDUgLTE5IDE3IC00MiAyOCAtMzEgMTQgLTQzIDE1IC00NiA2IC0yIC02IC0xMCAtMTIgLTE4IC0xMiAtMjYgMAotMTQgMTUgMjcgMzIgMzIgMTMgNDUgMTUgNTkgNiAxNCAtOSAyOCAtOSA1OCAwIDIyIDcgNDggOSA1OCA1IDExIC00IDE1IC0zCjEwIDUgLTExIDE4IC03NCAyNiAtOTIgMTIgLTExIC0xMCAtMTggLTEwIC0yNiAtMiAtMTIgMTIgLTEwIDEzIDEyIDE2IDExIDEKMTQgMjEgMyAyMCAtNSAwIC00MyAtMTcgLTg2IC0zOCAtMTA4IC01MiAtMjEyIC03NyAtMzQ0IC04MyAtMTcyIC05IC0zMTEgMjAKLTQ2MCA5NiAtNjkgMzQgLTY3IDM0IC03NiAyNHogbTE0MyAtODMgYzAgLTUgLTkgLTEwIC0yMSAtMTAgLTExIDAgLTE3IDUgLTE0CjEwIDMgNiAxMyAxMCAyMSAxMCA4IDAgMTQgLTQgMTQgLTEweiBtMTA1IC00MCBjMyAtNSAtMyAtMTAgLTE1IC0xMCAtMTIgMAotMTggNSAtMTUgMTAgMyA2IDEwIDEwIDE1IDEwIDUgMCAxMiAtNCAxNSAtMTB6IG01MTAgMCBjMyAtNSAtMSAtMTAgLTkgLTEwCi05IDAgLTE2IDUgLTE2IDEwIDAgNiA0IDEwIDkgMTAgNiAwIDEzIC00IDE2IC0xMHogbS0xMjAgLTE5IGMzIC01IDEgLTEyIC00Ci0xNSAtNSAtMyAtMTEgMSAtMTUgOSAtNiAxNiA5IDIxIDE5IDZ6IG0tMjgwIC0xMSBjLTMgLTUgLTExIC0xMCAtMTYgLTEwIC02CjAgLTcgNSAtNCAxMCAzIDYgMTEgMTAgMTYgMTAgNiAwIDcgLTQgNCAtMTB6Ii8+CjwvZz4KPC9zdmc+Cg==', '/front-assets/images/default/baner1.png', 'welcome1', NULL, NULL, NULL),
(2, 'אנו מתמקדים בשיעור הגריל שלך', 'אתר גרילמן ישראל מבית Carnivores Orginal, האתר שילמד אתכם איך להיות גרילמן מקצועי כדי להרוויח כסף טוב מכפי שאתם אוהבים - בשר', '/front-assets/images/default/baner2.png', 'welcome2', NULL, NULL, NULL),
(3, 'הקורסים הרגילים שלנו', 'קורס מכללות הוא שיעור המוצע על ידי מכללה או אוניברסיטה. קורסים אלה הם בדרך כלל חלק מתוכנית מובילה.', '', 'course', NULL, NULL, NULL),
(4, 'למה לבחור בגרילמן', 'תיאוריית בחירת בית הספר מניחה כי ההורים הם שחקנים רציונליים שיכולים לאסוף ולצרוך מידע כדי למצוא בית ספר התואם את צרכי ילדם. רצונות ההורים ויכולתם לבחור בתי ספר איכותיים.', '/front-assets/images/default/why.png', 'why', 'לעסוק במה שאתה אוהב\r\nתרוויחו הרבה כסף בכנות\r\nשפר את הידע שלך בעולם הבשר\r\nמבדילים בטעמים ובניחוחות\r\nבקרת צלייה וקייטרינג\r\nתיהנו ממחירי ספקים מוזלים באיכות גבוהה\r\nהמלצות', NULL, NULL),
(5, 'partner1', NULL, '/front-assets/images/default/partner1.jpg', 'partner1', NULL, NULL, NULL),
(6, 'partner2', NULL, '/front-assets/images/default/partner2.jpg', 'partner2', NULL, NULL, NULL),
(7, 'partner3', NULL, '/front-assets/images/default/partner3.jpg', 'partner3', NULL, NULL, NULL),
(8, 'partner4', NULL, '/front-assets/images/default/partner4.jpg', 'partner4', NULL, NULL, NULL),
(9, 'עדכון החדשות היומי שלנו', 'קורס מכללות הוא שיעור המוצע על ידי מכללה או אוניברסיטה. קורסים אלה הם בדרך כלל חלק מתוכנית מובילה.', '', 'post', NULL, NULL, NULL),
(10, '', 'אתר גרילמן הוא תוצאה של התפתחות הקהילה המקורית של טורפים.', '/storage/homepages/rNreHQupFSuXBExp2ojcHfWkf00CeXR5y3thwWoe.jpg', 'footer_logo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_number` int(11) DEFAULT NULL,
  `lesson_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `lesson_name`, `lesson_number`, `lesson_image`, `type`, `media`, `media_name`, `media_size`, `body`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'test lesson1', 1, '/storage/lessons/qI7H8hgkpquvx3E4xQTagoZ3URzHP3MhLjmVxlcB.jpg', 'vimeo', 'https://player.vimeo.com/video/1084537', 'study.#', '15min', '<p>Possimus non porro consequatur. Quidem deserunt quia eos labore sit. Et facere architecto possimus rerum illum doloremque. Temporibus labore eligendi quis nostrum iure impedit.</p>', 1, '2021-04-14 21:34:31', '2021-04-14 21:41:11'),
(2, 1, 'test lesson2', 2, '/storage/lessons/qI7H8hgkpquvx3E4xQTagoZ3URzHP3MhLjmVxlcB.jpg', 'vimeo', 'https://player.vimeo.com/video/1084537', 'study.#', '15min', '<p>Rerum ullam sapiente fugiat laborum alias neque voluptatem. Unde consectetur vitae quia consectetur incidunt cupiditate facere. Dolorum facilis nisi ab iusto ad molestiae cumque.</p>', 1, '2021-04-14 21:34:31', '2021-04-14 21:41:30'),
(4, 1, 'test lesson3', 3, '/storage/lessons/qI7H8hgkpquvx3E4xQTagoZ3URzHP3MhLjmVxlcB.jpg', 'vimeo', 'https://player.vimeo.com/video/1084537', 'study.#', '15min', '<p>Dolorem soluta laudantium at dolores in id et. Ut quas quis dolor molestiae amet. Aut dolorem quas sed non atque velit nam. Ut aperiam mollitia est blanditiis ad qui temporibus. Dolor beatae quisquam inventore natus eius aspernatur voluptatem est.</p>', 1, '2021-04-14 21:34:31', '2021-04-14 21:41:46'),
(5, 1, 'test lesson4', 4, '/storage/lessons/qI7H8hgkpquvx3E4xQTagoZ3URzHP3MhLjmVxlcB.jpg', 'vimeo', 'https://player.vimeo.com/video/1084537', 'study.#', '15min', '<p>Error eum sint eum sit necessitatibus eos soluta voluptatem. Quisquam fuga distinctio reprehenderit architecto natus. Beatae et quasi dolore ut autem non iusto. Corporis assumenda et odit voluptatem autem. Ex provident sunt nesciunt aperiam nobis quas. Quia et error aliquid perferendis molestias.</p>', 1, '2021-04-14 21:34:31', '2021-04-14 21:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_user`
--

CREATE TABLE `lesson_user` (
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://www.facebook.com',
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://twitter.com',
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://www.linkedin.com',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `facebook`, `twitter`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://www.facebook.com', 'https://twitter.com', 'https://www.linkedin.com', '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(518, '2014_10_12_000000_create_users_table', 1),
(519, '2014_10_12_100000_create_password_resets_table', 1),
(520, '2019_08_19_000000_create_failed_jobs_table', 1),
(521, '2021_03_09_063927_create_categories_table', 1),
(522, '2021_03_10_001405_add_username_to_users_table', 1),
(523, '2021_03_10_033353_create_posts_table', 1),
(524, '2021_03_10_140903_create_profiles_table', 1),
(525, '2021_03_10_142812_create_addresses_table', 1),
(526, '2021_03_10_143419_create_links_table', 1),
(527, '2021_03_12_063906_create_courses_table', 1),
(528, '2021_03_12_211944_create_lessons_table', 1),
(529, '2021_03_13_175535_create_questions_table', 1),
(530, '2021_03_14_210255_create_course_user_pivot_table', 1),
(531, '2021_03_14_234002_create_lesson_user_pivot_table', 1),
(532, '2021_03_16_025832_create_contacts_table', 1),
(533, '2021_03_16_035338_create_coupons_table', 1),
(534, '2021_03_16_073217_create_faqs_table', 1),
(535, '2021_03_16_144133_create_contactuses_table', 1),
(536, '2021_03_16_172630_create_aboutuses_table', 1),
(537, '2021_03_17_002419_create_roles_table', 1),
(538, '2021_03_17_002808_create_role_user_pivot_table', 1),
(539, '2021_03_18_074648_create_other_pages_table', 1),
(540, '2021_03_18_110122_create_likes_table', 1),
(541, '2021_03_18_150237_create_comments_table', 1),
(542, '2021_03_20_043206_create_locations_table', 1),
(543, '2021_03_20_080507_create_coupon_user_pivot_table', 1),
(544, '2021_03_21_052315_create_emails_table', 1),
(545, '2021_03_21_052826_create_emailtypes_table', 1),
(546, '2021_03_24_100313_create_temps_table', 1),
(547, '2021_03_26_070245_create_files_table', 1),
(548, '2021_03_26_104936_create_homepages_table', 1),
(549, '2021_03_27_064057_create_tags_table', 1),
(550, '2021_03_27_065029_create_post_tag_pivot_table', 1),
(551, '2021_03_27_192242_create_usertemps_table', 1),
(552, '2021_03_29_121703_create_notifications_table', 1),
(553, '2021_04_07_185439_add_timezone_column_to_users_table', 1),
(554, '2021_04_13_011203_create_footers_table', 1),
(555, '2021_04_13_134619_create_diplomas_table', 1),
(556, '2021_04_13_163804_create_banners_table', 1),
(557, '2021_04_13_163804_create_contract_content_table', 1),
(558, '2021_04_14_115742_create_settings_table', 1),
(559, '2021_04_14_115812_create_comingsoons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_pages`
--

CREATE TABLE `other_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_supply` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancellation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_responsibility` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_pages`
--

INSERT INTO `other_pages` (`id`, `policy`, `product_supply`, `cancellation`, `business_responsibility`, `created_at`, `updated_at`) VALUES
(1, 'Policy...', 'product_supply', 'cancellation', 'responsibility...', NULL, NULL);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `image`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ipsam atque debitis.', '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg', 'Autem fuga atque officiis vitae ex quia deleniti aut reiciendis sit quos autem nihil voluptatem rerum velit consequatur id et neque quidem quis quo ut eos odio consequatur eos eum expedita debitis dolores asperiores similique blanditiis ea aliquam ex ea ut ut tempore debitis inventore et aut laborum non dolore dolorem voluptate provident voluptate excepturi voluptas ut mollitia quibusdam eius vel debitis beatae quia sunt rem dolor architecto ut eos eveniet voluptas dicta dolorum blanditiis velit facilis vitae voluptas quae cum ex quia quis nemo sit dolores aliquam architecto repudiandae tempore placeat fuga nam facilis aspernatur non non est ad quia rerum omnis ut nam omnis assumenda rerum placeat repudiandae ipsam vel cum odio itaque labore velit quo ipsa nam non ut fugit necessitatibus vel veniam fugiat impedit autem debitis voluptatem voluptatibus quia reprehenderit dolore molestiae quis optio animi doloribus nesciunt beatae sit laudantium dolorem ullam vel officiis occaecati deleniti aspernatur natus alias facilis quam impedit maiores sunt perspiciatis doloremque dignissimos qui delectus iusto et error cumque dicta sed nesciunt enim consectetur et et eum rem adipisci quis aut eveniet necessitatibus est assumenda tempora architecto perferendis illo qui hic minus facilis fugit laudantium est eum aut illum autem quia sunt eos velit et corporis cumque est et odio saepe doloribus et qui distinctio ad aliquam debitis ad hic illo similique nulla dolorem et asperiores molestias qui minus numquam voluptatem cupiditate dolorem ipsa expedita non ipsa sed ab voluptatibus sit dolorem quo nisi consectetur et voluptatem expedita soluta tempora odit aliquid veritatis facere illo eaque voluptatem sint totam et aut officia et aperiam facere necessitatibus aperiam voluptas et aliquam ducimus est tenetur iure eos ducimus molestiae omnis minus sint quibusdam saepe eum exercitationem voluptatem repudiandae sed sit amet nobis sed in harum dolorem cupiditate sit consequatur maiores iure tempore sequi sed harum blanditiis et est consequatur ipsa totam inventore sunt numquam alias vel sit quia perferendis autem et vero et et est blanditiis nobis ut et ea praesentium quam minima occaecati suscipit explicabo ratione enim voluptates et incidunt beatae reiciendis sint repellendus quia quisquam et sit ut id aperiam sit omnis rem laudantium enim ab error sequi error eum eveniet tempora occaecati vel a voluptatem ut nemo sed dolorum eligendi quos natus et id deserunt libero labore vel error aut voluptatem quaerat rerum aut aut fugiat minus odit harum pariatur rem similique voluptate et laboriosam sed et architecto sint tempora fuga unde omnis reprehenderit sed vitae ducimus porro cumque placeat velit voluptatem perspiciatis laudantium dolorum est et voluptas deleniti non quidem quo libero qui accusamus cupiditate iste quia blanditiis.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(2, 1, 1, 'Fugiat fuga.', '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg', 'Dolores fugit non maxime voluptatum nostrum reiciendis ullam commodi totam quis et optio sunt sunt non minus id consequatur pariatur ut id quia fugiat iusto et cumque unde sit ea quidem vero et sit dignissimos omnis blanditiis et quas laboriosam harum aut autem autem voluptatibus rerum accusantium molestias dolores et aut illum dicta asperiores commodi fuga commodi iure earum quasi et non suscipit animi voluptas recusandae laudantium possimus iure distinctio autem eum nemo soluta unde velit aut et molestiae minima ea nihil est officia dignissimos tempore est unde qui culpa nihil voluptates ipsa reprehenderit ea quos dolorum dolor rerum repellat adipisci praesentium non labore repellendus voluptas error sequi reiciendis fuga vel a est voluptatibus sint et eos deleniti omnis aut sed enim asperiores quibusdam beatae quidem facilis et ipsum ipsum voluptas velit maxime sit voluptatem exercitationem ipsum vel harum debitis asperiores rem ducimus consequatur qui quia assumenda asperiores deserunt magni ut ipsa minus alias explicabo consequatur blanditiis molestiae blanditiis eius rerum animi rerum natus amet perferendis reprehenderit neque soluta praesentium soluta labore qui iste recusandae accusantium consequuntur ex modi inventore laboriosam quia velit ut sit voluptatem atque ullam quasi et minima dolores sit modi ad alias molestiae sapiente provident minima et libero et et molestiae sint numquam sunt omnis nobis aut amet occaecati tempore iusto dignissimos est labore est eum sunt qui expedita accusamus labore perspiciatis quod culpa incidunt necessitatibus rerum aspernatur voluptate tenetur ut eum et sit molestias hic quis aut eius sint tempore voluptas optio aut officiis at aut porro corporis voluptas ex maxime consequatur cum id exercitationem optio id facilis id non explicabo laboriosam quisquam harum rerum quisquam quidem magnam qui et quia maxime error ad rerum exercitationem eius dolorum unde voluptates ut non quia deleniti iure omnis dolor et voluptatem sunt aperiam aut nam quod voluptas ab distinctio autem aliquid saepe sit voluptatem aut consequatur necessitatibus dolore maxime est praesentium molestias ullam accusantium tempora dolor voluptatem officia quae placeat possimus tenetur dolor iusto vel non aliquid molestiae consequatur doloribus velit neque voluptas ratione voluptate voluptatem quibusdam aliquid fugit suscipit et sit qui maxime molestiae fuga earum molestiae adipisci qui sed ex velit rerum voluptas aut vel dolorem consequatur delectus magnam laboriosam quae facilis distinctio nihil modi velit aut aliquam enim adipisci molestias totam dolorem autem debitis aut illum voluptas fugiat corrupti occaecati neque sit reprehenderit fuga cum adipisci fugiat quis laboriosam sint enim sit quasi delectus rem tempora quis animi ut nisi repellendus rerum voluptatem ratione eos explicabo enim quod.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(3, 1, 1, 'Est voluptate.', '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg', 'Quis est laboriosam est in earum id qui rem aut consequatur alias et quia est quidem voluptates vel reiciendis sint fugiat excepturi eveniet dolor velit recusandae tempora sit molestiae sed rerum et voluptates ipsum ad dolorem non corrupti unde adipisci est vitae incidunt consequatur assumenda et repellat expedita dicta exercitationem minima alias magni alias sint perferendis ut et ut sit rerum quae est aspernatur ipsum enim sit quos praesentium cupiditate quia cum et alias quos non aut nesciunt aliquam et ut rerum dolorum rerum magni laboriosam suscipit numquam reiciendis est adipisci commodi et voluptas numquam repellendus nisi eum rem eligendi aut numquam itaque inventore in molestias necessitatibus tempore voluptatem repellat quasi unde nihil amet recusandae quia id soluta accusamus repellendus blanditiis molestias quis doloremque magnam facilis et consequatur nobis eligendi molestiae pariatur possimus atque nobis laborum voluptatibus delectus minus autem veritatis velit iusto asperiores dolor accusantium perspiciatis porro quibusdam consequatur consequatur autem fugit quis natus esse cupiditate magni praesentium omnis at officia perferendis velit sapiente consequatur fugit expedita dolores molestiae ratione eum alias voluptas debitis velit minus adipisci nostrum ipsum veniam doloribus quae et qui voluptas provident modi dolorem commodi temporibus culpa quas totam fugiat beatae dolorem non voluptate est natus assumenda harum aut a in rem modi inventore ullam vero quis quae cum qui deleniti veritatis ullam repellendus veniam qui autem atque ex et alias sit ratione aliquam in enim porro deserunt sunt ut ipsa nisi ipsum velit sunt rem repellat reprehenderit est aut est aut libero dignissimos deserunt suscipit animi officiis sunt iste qui sint molestias rem enim dolores laudantium et porro aliquam explicabo vitae nam voluptatibus aliquid repellat consequuntur consequatur numquam corrupti dolorem adipisci impedit voluptatem qui voluptas nostrum ipsum ea incidunt blanditiis harum harum et non provident placeat quasi aut praesentium et corrupti natus ex exercitationem nemo blanditiis quia omnis a a ratione sed velit fuga dolore voluptate labore hic eaque est rerum qui dolorem quasi sunt quaerat temporibus numquam et recusandae rerum et rerum et reprehenderit nulla labore dicta eos rerum blanditiis qui impedit dignissimos facilis quod qui id aut sit debitis ratione magnam voluptates ad fugit veritatis autem voluptatem accusamus adipisci dolorem qui itaque non ea quod exercitationem reprehenderit ut earum sit facere iste iure tenetur ea aut laboriosam est non nulla quia odio tenetur quia soluta voluptatem nostrum odit reprehenderit vel soluta velit molestias omnis quo autem quas quaerat molestiae fugit debitis omnis dolor eum est fugiat totam atque similique error eum quibusdam aperiam in ullam commodi nostrum eum quo quaerat rerum beatae necessitatibus autem iusto inventore alias non veritatis voluptatum enim id est possimus voluptates fugiat nihil enim aut maiores quo iure est ratione aut explicabo officia quia est tempore aperiam totam nobis at distinctio atque facilis recusandae quidem aspernatur blanditiis ut nobis nesciunt qui voluptatem distinctio aut.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(4, 1, 1, 'Numquam totam ut.', '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg', 'Et est quae quos explicabo delectus quas autem delectus et deserunt voluptatem similique incidunt ut deleniti modi distinctio iste non magnam dolorem quia doloremque eos deleniti modi optio rem quis aut quis pariatur unde quod quisquam a nobis ut recusandae sed et nobis omnis sit laudantium eligendi atque est pariatur in et itaque veritatis quia atque dolores explicabo exercitationem accusamus temporibus delectus sapiente id illo amet perspiciatis sunt suscipit quibusdam ut non quia vel quo fuga non officia quam odio pariatur nemo magni molestiae autem occaecati in rerum dignissimos amet nisi tempora aut quis aut iste omnis voluptatem omnis aut ab exercitationem voluptas sed cum accusantium veritatis officiis dolores animi suscipit sunt minima nobis architecto iusto libero ab magnam ipsa reiciendis et eligendi asperiores praesentium eius natus nemo harum et sed est earum magnam nostrum aut est placeat perspiciatis ut omnis suscipit ut architecto soluta quas ut adipisci asperiores optio itaque illo quibusdam quis consequatur et et sit adipisci laborum cum ullam vel et quasi fugit sapiente et porro quisquam deleniti possimus voluptas ullam dolor dignissimos perferendis velit quia voluptate sapiente maxime et praesentium praesentium aut sit impedit iure mollitia magni dolorum veritatis aliquid voluptas tempore laborum nam error sequi quas culpa maiores in excepturi quam vero nam alias aut ab molestiae aut cumque architecto nemo et iste qui nostrum earum ut atque molestias et odit enim commodi non natus nobis doloribus vel sit sed aut perspiciatis nemo modi ea non earum dolore nisi est sit minus cupiditate dignissimos molestias ab et consequatur veritatis sed maxime velit corrupti beatae neque eum qui sequi nulla labore qui iste ab pariatur nemo provident rerum illum aut pariatur quia voluptatem et ut sint distinctio non natus velit et veritatis qui expedita similique non soluta nesciunt in est fugiat perferendis iste et molestiae alias velit earum aut tempore corrupti quos voluptate corporis aut sunt et adipisci vero dolor aliquid ab odio nisi nulla expedita sunt sint sed explicabo veniam illo nesciunt qui nulla delectus iure ipsum ut est ut doloremque ab facere facere ut hic autem ea quia sunt dolor dolor suscipit animi maxime et eos voluptatem voluptatem aut dolorem unde sed aut aut natus perferendis numquam cupiditate officia recusandae eius soluta rerum at sapiente sunt perspiciatis harum repellat quaerat sit soluta illo explicabo officiis dolorum dolores consequatur beatae at fugit maiores rerum cum itaque tempore provident numquam quis et.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(5, 1, 1, 'Ducimus et.', '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg', 'Omnis deleniti sint laborum et autem molestias recusandae vel perferendis ducimus labore veniam at neque aut magni ab est dolor ducimus id illum voluptatem eius ut corporis sunt molestiae numquam placeat natus ratione provident id assumenda alias saepe aut ea consequatur rem sequi vero voluptatem voluptas earum quo laudantium voluptas enim ad aut est vero eos quo corporis necessitatibus praesentium soluta possimus architecto repellendus dolor iusto modi aspernatur fugit voluptas quibusdam vero non nobis non doloremque ut autem consequatur earum et nemo illum magnam ipsa esse praesentium iure facilis laudantium et voluptas voluptatum aut occaecati sed rerum nostrum assumenda vel incidunt blanditiis fuga est nihil vel accusantium magni et ea vel et sequi enim sed quo adipisci molestias quia adipisci aliquid odit aut pariatur non a porro nostrum qui voluptatem debitis consequatur numquam nobis et hic ut sit odio pariatur ut sit saepe ex sed voluptatem commodi sed atque repellat cum rerum qui atque aperiam qui aut quia necessitatibus ut eligendi repellat neque repellendus ut molestiae aperiam aperiam illum possimus vel aut reprehenderit sed voluptas officiis dignissimos optio sapiente sapiente impedit error mollitia est quaerat aperiam nulla dolor tempora non quis dolores dolorem delectus aut est animi et aut est voluptas repellendus corrupti possimus incidunt nostrum delectus rerum est aut quis ut qui magnam cum totam quia qui harum nihil tempore error nulla qui asperiores quod numquam quidem deserunt non optio qui omnis eius ut sit fugit atque neque labore minus quis nam sint quam fugit suscipit error est aspernatur rerum illum doloribus impedit sapiente ipsa unde non est aut nihil consequatur quidem laborum voluptates nihil et quia sint nihil.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(6, 1, 1, 'Voluptatem maiores.', '/storage/posts/IemJ3qSfrrVjFbcPM7ut5SlvhwOhxE1rnFXyBT28.jpg', 'Ut voluptatem labore quas sunt minus cum deserunt id inventore soluta et eos perspiciatis impedit voluptates voluptate rerum voluptate saepe est et sequi possimus aut ut excepturi quidem veniam autem aspernatur placeat dolorem aspernatur aperiam sit nisi id et ab et tenetur tenetur fuga facilis inventore rerum vel magnam magni saepe ratione quia et voluptatem sunt debitis id aut in quia non non aut laboriosam beatae fuga rerum quam sunt velit in consequatur blanditiis sit et cumque recusandae eius nulla dolor molestiae corrupti dolorum nemo culpa reiciendis unde numquam voluptas asperiores libero ipsa dolore ut totam ad molestias magni sequi quidem occaecati occaecati aut id et similique ut aut suscipit ex facere excepturi sint incidunt ut harum veritatis tempore accusamus laboriosam et debitis perferendis necessitatibus delectus sunt nesciunt reprehenderit modi rem mollitia et ex distinctio expedita exercitationem possimus esse dolor voluptates sit laudantium placeat architecto sit est voluptates nihil et ullam numquam atque veniam aut culpa molestias ipsa harum quis dolorum iste aliquid et sit repudiandae est ducimus quis ut distinctio quis delectus rem eaque repellat corrupti consequatur eligendi vel asperiores iste nemo ut nemo ut quis qui magnam sed voluptatem adipisci dolores autem similique dolorem cupiditate repellendus atque dolor quos dolor recusandae incidunt iusto sit modi illo ipsa excepturi eum fuga illo qui ad laborum ullam ea est omnis voluptatem quas libero non et distinctio iure ratione voluptatem ab quisquam non minima cumque expedita ducimus harum vero sed sit eum rem laboriosam perferendis voluptate hic aut sed in asperiores quisquam sit quis officiis laborum ut eos commodi veritatis quo quia illo aliquam rerum eaque aspernatur earum quia nisi dolorem voluptas eius ab incidunt et dolor tenetur ipsum necessitatibus iste similique ut ut necessitatibus nihil aut sunt aut est aut quia illum vel tempora autem quis ea totam qui necessitatibus rem repudiandae voluptas praesentium debitis cum rerum culpa laudantium et dolores ratione est enim nostrum excepturi quas voluptatem cum quas at voluptas enim aut impedit necessitatibus vel debitis est beatae quam nihil sit dolor qui recusandae illo eaque omnis dolorum vel eos quae deserunt sint consequatur excepturi labore eius voluptate veniam pariatur quasi quisquam ex quibusdam cupiditate vero et est culpa commodi suscipit aut quasi aut doloribus veritatis et minus vitae fugiat sequi possimus modi reprehenderit suscipit quo exercitationem ipsa voluptatem odit illo nisi enim eum doloribus beatae dignissimos natus eum est qui quae occaecati dolor velit repellat et et repudiandae inventore asperiores soluta eum soluta error tenetur consequuntur autem dolores ullam dolorem ut et quia ipsa consequuntur sunt sit sunt iste esse dicta ut similique qui vel maiores dolorem fuga ut aperiam dicta hic.', '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_activity` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `confirmation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `dob`, `sign_data`, `last_activity`, `active`, `confirmation_code`, `bio`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 0, 0, NULL, NULL, 0, '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `q` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_number` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `lesson_id`, `q`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `answer_number`, `question_number`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is your birthday?', 'Veritatis magnam.', 'Labore ut tempora.', 'Facere rerum quasi.', 'Sit molestias.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(2, 4, 'What is your birthday?', 'Animi enim laborum.', 'Sint reiciendis.', 'Eum omnis sunt.', 'Velit voluptatibus.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(3, 4, 'What is your birthday?', 'Ut voluptas.', 'Sed fuga deserunt.', 'Dolores in eius.', 'Sint accusamus.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(4, 2, 'What is your birthday?', 'Est dicta illo non.', 'Ex similique illum.', 'Aut qui fuga modi.', 'Pariatur.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(8, 2, 'What is your birthday?', 'Quis autem quisquam.', 'Repudiandae labore.', 'At voluptatem alias.', 'Voluptatem voluptas.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(9, 2, 'What is your birthday?', 'Quo eum tempora.', 'Qui ad commodi ad.', 'Voluptas.', 'Voluptas voluptas.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(11, 1, 'What is your birthday?', 'Facilis aut ullam.', 'Vero harum et ea.', 'Quasi quibusdam.', 'Aut corporis.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(13, 5, 'What is your birthday?', 'Accusamus quas quos.', 'Ut iusto sit.', 'Odit sunt ut.', 'In commodi sed.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(19, 1, 'What is your birthday?', 'Voluptatibus ut vel.', 'Neque recusandae.', 'Eveniet corrupti.', 'Sint sequi.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(20, 5, 'What is your birthday?', 'Corporis numquam.', 'Nihil quis.', 'Distinctio quis non.', 'Tenetur consequatur.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(21, 2, 'What is your birthday?', 'Culpa quod nesciunt.', 'Libero quis.', 'Et voluptatem.', 'Recusandae laborum.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(25, 5, 'What is your birthday?', 'Aspernatur labore.', 'Voluptatem dolores.', 'Adipisci quibusdam.', 'Vitae saepe eos et.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(27, 1, 'What is your birthday?', 'Tempore qui modi ut.', 'Aut voluptas.', 'Placeat placeat aut.', 'Possimus veritatis.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(28, 2, 'What is your birthday?', 'Et quidem beatae.', 'Autem suscipit.', 'Consectetur.', 'Qui blanditiis quod.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(32, 5, 'What is your birthday?', 'Maxime id similique.', 'Quae esse rerum et.', 'Officiis nesciunt.', 'Nisi aut nulla eum.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(33, 5, 'What is your birthday?', 'Accusantium quo.', 'In a sit qui ut.', 'Optio ex et et.', 'Odit quia velit.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(35, 4, 'What is your birthday?', 'Et corporis sint.', 'Sint qui labore.', 'Veritatis quos et.', 'Adipisci.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(37, 4, 'What is your birthday?', 'Consectetur amet.', 'Velit laboriosam.', 'Quis alias adipisci.', 'Consectetur atque.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(38, 1, 'What is your birthday?', 'Laboriosam labore.', 'Et ullam sequi aut.', 'Amet aut quo magnam.', 'Quae sed delectus.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(39, 4, 'What is your birthday?', 'Et officia omnis.', 'Itaque repudiandae.', 'Repellat dolores.', 'Dolores.', NULL, '1', NULL, 1, '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `type_id`, `active`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'coming_soon', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Illo.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(2, 'Nam.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(3, 'Nisi.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(4, 'Non.', '2021-04-14 21:34:31', '2021-04-14 21:34:31'),
(5, 'Eos.', '2021-04-14 21:34:31', '2021-04-14 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `temps`
--

CREATE TABLE `temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT 1,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `username`, `phone`, `phone_verified`, `identity`, `company`, `address`, `status`, `remember_token`, `timezone`, `created_at`, `updated_at`) VALUES
(1, 'Maya', 'O\'Reilly', 'admin@gmail.com', '2021-04-14 21:34:31', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Marlin Hills', '140404', 1, '592989', 'Spencer-Prosacco', '1654 Kenyatta Corners\nWest Chelsea, NM 17820', 1, 'QDNehCahVtoRmzHOnvr1F6484rFpA4csUPadFWQ3IJFUXHAFrFkAMhrkb41z', 'America/New_York', '2021-04-14 21:34:31', '2021-04-14 21:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `usertemps`
--

CREATE TABLE `usertemps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `sign_data` blob DEFAULT NULL,
  `ask_pay` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertemps`
--

INSERT INTO `usertemps` (`id`, `phone_token`, `firstname`, `lastname`, `email`, `password`, `username`, `phone`, `identity`, `company`, `address`, `course_id`, `sign_data`, `ask_pay`, `created_at`, `updated_at`) VALUES
(1, '89725ea0416b26ad74f4300d15bb1780', 'Maya', 'O\'Reilly', 'admin@gmail.com', '0', NULL, '+972140404', '592989', 'Spencer-Prosacco', '1654 Kenyatta Corners\nWest Chelsea, NM 17820', 1, NULL, 1, '2021-04-14 21:43:25', '2021-04-14 21:43:25'),
(2, 'e556b40a47eaedfe15c8edd0cb2055ec', 'Maya', 'O\'Reilly', 'admin@gmail.com', '0', NULL, '+972140404', '592989', 'Spencer-Prosacco', '1654 Kenyatta Corners\nWest Chelsea, NM 17820', 1, NULL, 1, '2021-04-14 21:43:45', '2021-04-14 21:43:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comingsoons`
--
ALTER TABLE `comingsoons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_content`
--
ALTER TABLE `contract_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_user_coupon_code_unique` (`coupon_code`),
  ADD KEY `coupon_user_user_id_foreign` (`user_id`),
  ADD KEY `coupon_user_course_id_foreign` (`course_id`),
  ADD KEY `coupon_user_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `diplomas`
--
ALTER TABLE `diplomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diplomas_user_id_foreign` (`user_id`),
  ADD KEY `diplomas_course_id_foreign` (`course_id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailtypes`
--
ALTER TABLE `emailtypes`
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
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `footers_slug_unique` (`slug`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `lesson_user`
--
ALTER TABLE `lesson_user`
  ADD PRIMARY KEY (`lesson_id`,`user_id`),
  ADD KEY `lesson_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `other_pages`
--
ALTER TABLE `other_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temps_user_id_foreign` (`user_id`),
  ADD KEY `temps_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_identity_unique` (`identity`);

--
-- Indexes for table `usertemps`
--
ALTER TABLE `usertemps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertemps_course_id_foreign` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comingsoons`
--
ALTER TABLE `comingsoons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract_content`
--
ALTER TABLE `contract_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_user`
--
ALTER TABLE `coupon_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diplomas`
--
ALTER TABLE `diplomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailtypes`
--
ALTER TABLE `emailtypes`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `other_pages`
--
ALTER TABLE `other_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `temps`
--
ALTER TABLE `temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertemps`
--
ALTER TABLE `usertemps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_user`
--
ALTER TABLE `coupon_user`
  ADD CONSTRAINT `coupon_user_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `diplomas`
--
ALTER TABLE `diplomas`
  ADD CONSTRAINT `diplomas_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `diplomas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_user`
--
ALTER TABLE `lesson_user`
  ADD CONSTRAINT `lesson_user_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `temps`
--
ALTER TABLE `temps`
  ADD CONSTRAINT `temps_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `temps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usertemps`
--
ALTER TABLE `usertemps`
  ADD CONSTRAINT `usertemps_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
