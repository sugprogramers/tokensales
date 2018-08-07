CREATE TABLE c_currency
(
  c_currency_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  iso_code character(3) NOT NULL,
  cursymbol character varying(10) NOT NULL,
  description character varying(255) NOT NULL,
  stdprecision numeric(10,0) NOT NULL,
  CONSTRAINT c_currency_key PRIMARY KEY (c_currency_id),
  CONSTRAINT c_currencyisocode UNIQUE (iso_code),
  CONSTRAINT c_currency_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_currency
  OWNER TO smart;



CREATE TABLE c_country
(
  c_country_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(60) NOT NULL,
  description character varying(255),
  countrycode character(2) NOT NULL,

  CONSTRAINT c_country_key PRIMARY KEY (c_country_id),
  CONSTRAINT c_countrycode UNIQUE (countrycode),
  CONSTRAINT c_country_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_country
  OWNER TO smart;

CREATE TABLE c_region
(
  c_region_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(60) NOT NULL,
  description character varying(255),
  c_country_id character varying(32) NOT NULL,

  CONSTRAINT c_region_key PRIMARY KEY (c_region_id),
  CONSTRAINT c_region_c_country FOREIGN KEY (c_country_id)
      REFERENCES c_country (c_country_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT c_region_name UNIQUE (c_country_id, name),
  CONSTRAINT c_region_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_region
  OWNER TO smart;


CREATE TABLE c_file
(
  c_file_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(1000) NOT NULL,

  --PDF: pdf
  --TXT: plain text
  --IMG: image
  datatype character varying(32),
  path character varying(2000) NOT NULL,
  CONSTRAINT c_file_key PRIMARY KEY (c_file_id),
  CONSTRAINT c_file_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_file
  OWNER TO smart;

CREATE TABLE c_user
(
  c_user_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  email character varying(255) NOT NULL,
  password character varying(40) NOT NULL,
 
  phone character varying(40) NOT NULL,
  firstname character varying(60) NOT NULL,
  lastname character varying(60) NOT NULL,
  birthday timestamp without time zone NOT NULL,

  address1 character varying(150) NOT NULL,
  address2 character varying(150),

  c_country_id character varying(32) NOT NULL,
  c_region_id character varying(32) NOT NULL,

  city character varying(60) NOT NULL,
  postal character varying(10) NOT NULL,

  --ADM: admin 
  --INV: investor 
  --COMPMAN: project manager
  usertype character varying(60) NOT NULL DEFAULT 'INV'::character varying, 

  registertoken character varying(60),
  tokenexpirationdate timestamp without time zone,

  --PEND: pending validation
  --VAL: validated
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying,

  CONSTRAINT c_user_key PRIMARY KEY (c_user_id),
  CONSTRAINT c_user_c_country_fk FOREIGN KEY (c_country_id)
      REFERENCES c_country (c_country_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_user_c_region_fk FOREIGN KEY (c_region_id)
      REFERENCES c_region (c_region_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_user_email_uniq UNIQUE(email),
  CONSTRAINT c_user_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_user
  OWNER TO smart;

CREATE TABLE c_admin
(
  c_admin_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  c_user_id character varying(32) NOT NULL,

  --PAYPAL INFORMATION
  paypalusername character varying(60) NOT NULL,


  CONSTRAINT c_admin_key PRIMARY KEY (c_admin_id),
  CONSTRAINT c_admin_c_user_fk FOREIGN KEY (c_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_admin_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_admin
  OWNER TO smart;

CREATE TABLE c_projectmanager
(
  c_projectmanager_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  c_user_id character varying(32) NOT NULL,

  --PAYPAL INFORMATION
  paypalusername character varying(60) NOT NULL,


  CONSTRAINT c_projectmanager_key PRIMARY KEY (c_projectmanager_id),
  CONSTRAINT c_projectmanager_c_user_fk FOREIGN KEY (c_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_projectmanager_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_projectmanager
  OWNER TO smart;

CREATE TABLE c_investor
(
  c_investor_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  c_user_id character varying(32) NOT NULL,
  

  --TAX INFORMATION
  c_tax_country_id character varying(32),
  tax_address1 character varying(150),
  tax_city character varying(60),
  tax_postal character varying(10),
  tax_fiscalnumber character varying(60),
  tax_isuscitizen character(1) NOT NULL DEFAULT 'Y'::bpchar,
  tax_ustin character varying(60),
  
  --IDENTIFICATION
  --PASS: Passport 
  --IN: Identification Number
  documenttype character varying(60) DEFAULT 'PASS'::character varying,
  documentnumber character varying(60),
  c_docimgfront_id character varying(32),
  c_docimgback_id character varying(32),

  --PEND: pending validation
  --VAL: validated
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying,
  validateddate timestamp without time zone,
  validationnotes character varying(255),

  --PAYPAL PAYIN INFORMATION
  payin_paypalusername character varying(60) NOT NULL,

  --BALANCE
  payinbalance numeric NOT NULL DEFAULT 0,
  payoutbalance numeric NOT NULL DEFAULT 0,
  pendingbalance numeric NOT NULL DEFAULT 0,

  CONSTRAINT c_investor_key PRIMARY KEY (c_investor_id),
  CONSTRAINT c_investor_c_user_fk FOREIGN KEY (c_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_investor_tax_country_fk FOREIGN KEY (c_tax_country_id)
      REFERENCES c_country (c_country_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_investor_docimgfront_fk FOREIGN KEY (c_docimgfront_id)
      REFERENCES c_file (c_file_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_investor_docimgback_fk FOREIGN KEY (c_docimgback_id)
      REFERENCES c_file (c_file_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_investor_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_investor
  OWNER TO smart;


CREATE TABLE c_emailqueue
(
  c_emailqueue_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
 
  rcptto character varying(50) NOT NULL,
  subject character varying(50) NOT NULL,
  body text NOT NULL,

  --NSENT: not sent
  --SENT: sent
  status character varying(60) NOT NULL DEFAULT 'NSENT'::character varying,
  emaillog text NOT NULL,
  c_user_id character varying(32) NOT NULL,

  CONSTRAINT c_emailqueue_key PRIMARY KEY (c_emailqueue_id),
  CONSTRAINT c_emailqueue_c_user_fk FOREIGN KEY (c_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_emailqueue_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_emailqueue
  OWNER TO smart;


CREATE TABLE c_projecttype
(
  c_projecttype_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(60) NOT NULL,
  description character varying(255),
  CONSTRAINT c_projecttype_key PRIMARY KEY (c_projecttype_id),
  CONSTRAINT c_projecttype_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_projecttype
  OWNER TO smart;


CREATE TABLE c_project
(
  c_project_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(60) NOT NULL, 

  c_projectmanager_id character varying(32) NOT NULL,
  companyName character varying(60) NOT NULL,
  c_currency_id character varying(32) NOT NULL,

  c_projecttype_id character varying(32),

  --PEND: pending evaluation
  --FU:funding
  --COFU: funding completed
  --NCOFU: funding did not complete
  --VO: voided
  --ACT: active
  --FI:finished
  projectstatus character varying(60) NOT NULL DEFAULT 'PEND'::character varying,
  
  --AP: Apartment 
  --SUI: Suite
  --BUI: Building
  propertytype character varying(60) NOT NULL DEFAULT 'AP'::character varying,
  qtyproperty numeric NOT NULL DEFAULT 1,

  address1 character varying(150),
  c_country_id character varying(32) NOT NULL,
  c_region_id character varying(32) NOT NULL,
  city character varying(60),

  --DEVELOPMENT LOAN AMTS
  totalyieldperc numeric NOT NULL DEFAULT 1, --total yield
  loanterm numeric NOT NULL DEFAULT 1, --loan term in months

  datelimit timestamp without time zone NOT NULL, --limit to collect targetamt
  targetamt numeric NOT NULL DEFAULT 0, --financial goal

  startdate timestamp without time zone, --start date of the loan

  --PROJECT PRESENTATION
  homeimage_id character varying(32),
  description text, 

  CONSTRAINT c_project_key PRIMARY KEY (c_project_id),
  CONSTRAINT c_project_c_proman FOREIGN KEY (c_projectmanager_id)
      REFERENCES c_projectmanager (c_projectmanager_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE SET NULL,
  CONSTRAINT c_project_c_currency FOREIGN KEY (c_currency_id)
      REFERENCES c_currency (c_currency_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_project_projecttype_fk FOREIGN KEY (c_projecttype_id)
      REFERENCES c_projecttype (c_projecttype_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_project_c_country_fk FOREIGN KEY (c_country_id)
      REFERENCES c_country (c_country_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_project_c_region_fk FOREIGN KEY (c_region_id)
      REFERENCES c_region (c_region_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_project_homeimage_fk FOREIGN KEY (homeimage_id)
      REFERENCES c_file (c_file_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_project_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_project
  OWNER TO smart;


  


CREATE TABLE c_projectdocumenttype
(
  c_projectdocumenttype_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(1000) NOT NULL, --Permits, Due Diligence, etc
  description character varying(255),
  ismandatory character(1) NOT NULL DEFAULT 'Y'::bpchar,

  CONSTRAINT c_projectdocumenttype_key PRIMARY KEY (c_projectdocumenttype_id),
  CONSTRAINT c_projectdocumenttype_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar])),
  CONSTRAINT c_projectdocumenttype_ismandatory_check CHECK (ismandatory = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_projectdocumenttype
  OWNER TO smart;


CREATE TABLE c_projectdocument
(
  c_projectdocument_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  c_project_id character varying(32) NOT NULL,
  c_projectdocumenttype_id character varying(32) NOT NULL,
  c_file_id character varying(32) NOT NULL,

  --PEND: pending evaluation 
  --VAL: validated
  --NVAL: not validated
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying,
  CONSTRAINT c_projectdocument_key PRIMARY KEY (c_projectdocument_id),
  CONSTRAINT c_projectdocument_project_fk FOREIGN KEY (c_project_id)
      REFERENCES c_project (c_project_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_projectdocument_projectdocumenttype_fk FOREIGN KEY (c_projectdocumenttype_id)
      REFERENCES c_projectdocumenttype (c_projectdocumenttype_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_projectdocument_file_fk FOREIGN KEY (c_file_id)
      REFERENCES c_file (c_file_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_projectdocument_unq UNIQUE (c_project_id,c_projectdocumenttype_id, c_file_id),
  CONSTRAINT c_projectdocument_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_projectdocument
  OWNER TO smart;


CREATE TABLE fin_investment
(
  fin_investment_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,

  --PEND: pending 
  --ACT: active 
  --FIN: finished 
  --VO: voided
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying,
  c_project_id character varying(32) NOT NULL,
  c_investor_id character varying(32) NOT NULL,
  startdate timestamp without time zone,
  amount numeric NOT NULL,
  
  CONSTRAINT fin_investment_key PRIMARY KEY (fin_investment_id),
  CONSTRAINT fin_investment_project_fk FOREIGN KEY (c_project_id)
      REFERENCES c_project (c_project_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_investment_investor_fk FOREIGN KEY (c_investor_id)
      REFERENCES c_investor (c_investor_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_investment_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE fin_investment
  OWNER TO smart;


CREATE TABLE fin_payment_order
(
  fin_payment_order_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  --PEND: pending 
  --CO: completed
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying,
  scheduleddate timestamp without time zone NOT NULL,
  amount numeric NOT NULL,

  --INVPAYOUT: investor payout 
  --PROMPAYOUT: project manager payout
  ordertype character varying(60) NOT NULL DEFAULT 'INVPAYOUT'::character varying,
  fin_investment_id character varying(32),
  c_project_id character varying(32),
  c_investor_id character varying(32),

  paymentdate timestamp without time zone,

  CONSTRAINT fin_payment_order_key PRIMARY KEY (fin_payment_order_id),
  CONSTRAINT fin_payment_order_investment_fk FOREIGN KEY (fin_investment_id)
      REFERENCES fin_investment (fin_investment_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_order_project_fk FOREIGN KEY (c_project_id)
      REFERENCES c_project (c_project_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_order_investor_fk FOREIGN KEY (c_investor_id)
      REFERENCES c_investor (c_investor_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_order_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE fin_payment_order
  OWNER TO smart;

CREATE TABLE fin_payment_history
(
  fin_payment_history_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
 
  paymentdate timestamp without time zone NOT NULL,
  --PEND: pending
  --CO: completed
  --ERR: completed with error
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying,

  --INT: internal
  --EXT: external
  type character varying(60) NOT NULL,
  c_currency_id character varying(32) NOT NULL,
  amount numeric NOT NULL,
  fromaccount character varying(60) NOT NULL,
  toaccount character varying(60) NOT NULL,
  description character varying(255) NOT NULL,

  fin_payment_order_id character varying(32),

  from_user_id character varying(32) NOT NULL,
  to_user_id character varying(32) NOT NULL,

  CONSTRAINT fin_payment_history_key PRIMARY KEY (fin_payment_history_id),
  CONSTRAINT fin_payment_history_currency_fk FOREIGN KEY (c_currency_id)
      REFERENCES c_currency (c_currency_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_history_payorder_fk FOREIGN KEY (fin_payment_order_id)
      REFERENCES fin_payment_order (fin_payment_order_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_history_fromuser_fk FOREIGN KEY (from_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_history_touser_fk FOREIGN KEY (to_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_history_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE fin_payment_history
  OWNER TO smart;
