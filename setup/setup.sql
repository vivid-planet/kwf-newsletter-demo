INSERT INTO `kwc_basic_cards` (`component_id`, `component`) VALUES
('47', 'extern'),
('53', 'extern');

INSERT INTO `kwc_basic_link_extern` (`component_id`, `target`, `rel`, `param`, `open_type`, `width`, `height`, `menubar`, `toolbar`, `locationbar`, `statusbar`, `scrollbars`, `resizable`) VALUES
('47-child', 'http://www.koala-framework.org/license', NULL, NULL, 'blank', 0, 0, 1, 1, 1, 1, 1, 1),
('53-child', 'http://www.koala-framework.org/imprint', NULL, NULL, 'blank', 0, 0, 1, 1, 1, 1, 1, 1);

INSERT INTO `kwc_basic_text` (`component_id`, `content`, `content_edit`, `data`) VALUES
('1-1-text', '<h1>\n  Koala Web Framework CMS Demo\n</h1>\n<p>\n  <strong>Powerful open source framework for web applications and websites</strong>\n</p>', NULL, '[]'),
('1-2-text', '<p>\n  Lorem ipsum vix at error <em>vocibus</em>, sit at autem liber? Qui eu odio\n  moderatius, populo pericula <strong>ex</strong> his. Mea hinc decore tempor ei,\n  postulant honestatis eum ut. Eos te assum elaboraret, in ius fastidii officiis\n  electram.\n</p>', NULL, '[]'),
('51-4-text', '<p>\n  Lorem ipsum vix at error vocibus, sit at autem liber? Qui eu odio moderatius,\n  populo pericula ex his. Mea hinc decore tempor ei, postulant honestatis eum ut. Eos\n  te assum elaboraret, in ius fastidii officiis electram.\n</p>', NULL, '[]'),
('51-5-1-6-text', '<p>\n  Lorem ipsum vix at error <em>vocibus</em>, sit at autem liber? Qui eu odio\n  moderatius, populo pericula <strong>ex</strong> his. Mea hinc decore tempor ei,\n  postulant honestatis eum ut. Eos te assum elaboraret, in ius fastidii officiis\n  electram.\n</p>', NULL, '[]'),
('51-5-2-10-text', '<p>\n  Lorem ipsum vix at error vocibus, sit at autem liber? Qui eu odio moderatius,\n  populo pericula ex his. Mea hinc decore tempor ei, postulant honestatis eum ut. Eos\n  te assum elaboraret, in ius fastidii officiis electram.\n</p>', NULL, '[]'),
('51-5-2-7-3-8-text', '<p>\n  Lorem ipsum vix at error vocibus, sit at autem liber?\n</p>', NULL, '[]'),
('51-5-2-7-4-9-text', '<p>\n  Lorem ipsum vix at error vocibus, sit at autem liber? Qui eu odio moderatius,\n  populo pericula ex his. Mea hinc decore tempor ei, postulant honestatis eum ut. Eos\n  te assum elaboraret, in ius fastidii officiis electram.\n</p>', NULL, '[]'),
('54-3-text', '<p>\n  Lorem ipsum vix at error vocibus, sit at autem liber? Qui eu odio moderatius,\n  populo pericula ex his. Mea hinc decore tempor ei, postulant honestatis eum ut. Eos\n  te assum elaboraret, in ius fastidii officiis electram.\n</p>', NULL, '[]');

INSERT INTO `kwc_composite_list` (`id`, `component_id`, `pos`, `visible`, `data`) VALUES
(1, '51-5', 1, 1, '{"width":"50%"}'),
(2, '51-5', 2, 1, '{"width":"50%"}'),
(3, '51-5-2-7', 1, 1, '{"title":"Lorem Ipsum"}'),
(4, '51-5-2-7', 2, 1, '{"title":"Dolor Sit Amet"}');

INSERT INTO `kwc_data` (`component_id`, `data`) VALUES
('1-1', '{"position":"left","image":""}'),
('1-2', '{"position":"left","image":""}'),
('47-metaTags', '{"description":"","keywords":""}'),
('47-title', '{"title":""}'),
('51-4', '{"position":"left","image":""}'),
('51-5-1-6', '{"position":"left","image":""}'),
('51-5-2-10', '{"position":"left","image":""}'),
('51-5-2-7-3-8', '{"position":"left","image":""}'),
('51-5-2-7-4-9', '{"position":"left","image":""}'),
('51-metaTags', '{"description":"","keywords":""}'),
('51-title', '{"title":""}'),
('53-metaTags', '{"description":"","keywords":""}'),
('53-title', '{"title":""}'),
('54-3', '{"position":"left","image":""}'),
('54-metaTags', '{"description":"","keywords":""}'),
('54-title', '{"title":""}');

INSERT INTO `kwc_paragraphs` (`id`, `component_id`, `pos`, `visible`, `component`) VALUES
(1, '1', 1, 1, 'textImage'),
(2, '1', 2, 1, 'textImage'),
(3, '54', 1, 1, 'textImage'),
(4, '51', 1, 1, 'textImage'),
(5, '51', 2, 1, 'columns'),
(6, '51-5-1', 1, 1, 'textImage'),
(7, '51-5-2', 1, 1, 'tabs'),
(8, '51-5-2-7-3', 1, 1, 'textImage'),
(9, '51-5-2-7-4', 1, 1, 'textImage'),
(10, '51-5-2', 2, 1, 'textImage');

INSERT INTO `kwf_pages` (`id`, `pos`, `parent_id`, `is_home`, `filename`, `name`, `visible`, `hide`, `component`, `custom_filename`) VALUES
(1, 1, 'root-bottom', 1, 'home_1', 'Home', 1, 0, 'paragraphs', 0),
(2, 1, 'root-main', 0, 'page1', 'Page1', 1, 0, 'firstChildPage', 0),
(7, 3, 'root-main', 0, 'contact', 'Contact', 1, 0, 'firstChildPage', 0),
(43, 1, '7', 0, 'contact_us', 'Contact us', 1, 0, 'paragraphs', 0),
(47, 2, 'root-bottom', 0, 'license', 'License', 1, 0, 'link', 0),
(51, 2, 'root-main', 0, 'page_2', 'Page 2', 1, 0, 'paragraphs', 0),
(53, 3, 'root-bottom', 0, 'imprint', 'Imprint', 1, 0, 'link', 0),
(54, 1, '2', 0, 'page_1_1', 'Page 1.1', 1, 0, 'paragraphs', 0);

INSERT INTO `kwf_users` (`id`, `role`, `language`, `email`, `password`, `password_salt`, `gender`, `title`, `firstname`, `lastname`, `created`, `deleted`, `locked`, `logins`, `last_login`) VALUES
(9, 'admin', 'en', 'demo@koala-framework.org', 'b2c5ae6bb7bec6021e3224f316d8a0c0', '684e86989d', 'male', '', 'Koala', 'Framework', '2011-10-25 10:06:07', 0, 0, 2, '2011-10-25 10:50:59');

