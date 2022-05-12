CREATE TABLE tx_recipearpr_domain_model_recipe (
	name varchar(255) NOT NULL DEFAULT '',
	dish_type int(11) DEFAULT '0' NOT NULL,
	cooking_time double(11,2) NOT NULL DEFAULT '0.00',
	preparation_time double(11,2) NOT NULL DEFAULT '0.00',
	review_aggregate double(11,2) DEFAULT NULL,
	steps text,
	nb_person varchar(255) NOT NULL DEFAULT '',
	pictures int(11) unsigned NOT NULL DEFAULT '0',
	difficulty double(11,2) NOT NULL DEFAULT '0.00',
	ingredients int(11) unsigned NOT NULL DEFAULT '0',
	theme int(11) unsigned NOT NULL DEFAULT '0',
	ustencils int(11) unsigned NOT NULL DEFAULT '0',
	origin int(11) unsigned DEFAULT '0',
	reviews int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_recipearpr_domain_model_ingredient (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_recipearpr_domain_model_ustencil (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_recipearpr_domain_model_recipeingredient (
	recipe int(11) unsigned DEFAULT '0' NOT NULL,
	quantity int(11) NOT NULL DEFAULT '0',
	ingredient int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_recipearpr_domain_model_origin (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_recipearpr_domain_model_theme (
	name varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_recipearpr_domain_model_review (
	recipe int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	content varchar(255) NOT NULL DEFAULT '',
	grade int(11) NOT NULL DEFAULT '0',
	author varchar(255) NOT NULL DEFAULT ''
);
