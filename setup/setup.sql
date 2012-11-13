INSERT INTO `kwc_basic_text` (`component_id`, `content`, `content_edit`, `data`) VALUES
('root-newsletter_1-mail-content-1-text', '<p>\n  Lorem ipsum vix at error <em>vocibus</em>, sit at autem liber? Qui eu odio\n  moderatius, populo pericula ex his. Mea hinc decore tempor ei, postulant honestatis\n  eum ut. Eos te assum elaboraret, in ius fastidii officiis electram.\n</p>', NULL, '[]');

INSERT INTO `kwc_data` (`component_id`, `data`) VALUES
('root-newsletter_1-mail-content-1', '{"position":"left","image":false}');

INSERT INTO `kwc_mail` (`component_id`, `subject`, `from_email`, `from_name`, `reply_email`) VALUES
('root-newsletter_1-mail', 'Test Newsletter', 'office@koala-framework.org', 'Koala', '');

INSERT INTO `kwc_newsletter` (`id`, `component_id`, `create_date`, `status`, `count_sent`, `last_sent_date`) VALUES
(1, 'root-newsletter', '2012-11-13 16:55:30', NULL, NULL, NULL);

INSERT INTO `kwc_newsletter_categories` (`id`, `newsletter_component_id`, `pos`, `category`) VALUES
(1, 'root-newsletter', 1, 'General');

INSERT INTO `kwc_newsletter_subscribers` (`id`, `newsletter_component_id`, `gender`, `title`, `firstname`, `lastname`, `email`, `format`, `subscribe_date`, `unsubscribed`, `activated`) VALUES
(1, 'root-newsletter', 'male', '', 'Niko', 'Sams', 'ns@vivid-planet.com', 'html', '2012-11-13 16:57:32', 0, 1);

INSERT INTO `kwc_newsletter_subscribers_to_category` (`id`, `subscriber_id`, `category_id`) VALUES
(1, 1, 1);

INSERT INTO `kwc_paragraphs` (`id`, `component_id`, `pos`, `visible`, `component`) VALUES
(1, 'root-newsletter_1-mail-content', 1, 1, 'textImage');

INSERT INTO `kwf_users` (`id`, `role`, `language`, `email`, `password`, `password_salt`, `gender`, `title`, `firstname`, `lastname`, `created`, `deleted`, `locked`, `logins`, `last_login`) VALUES
(9, 'admin', 'en', 'demo@koala-framework.org', 'b2c5ae6bb7bec6021e3224f316d8a0c0', '684e86989d', 'male', '', 'Koala', 'Framework', '2011-10-25 10:06:07', 0, 0, 2, '2011-10-25 10:50:59');

