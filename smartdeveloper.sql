

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
  OWNER TO tad;



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
  OWNER TO tad;

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
  OWNER TO tad;


CREATE TABLE c_user
(
  c_user_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  username character varying(60) NOT NULL,
  password character varying(40) NOT NULL,
  email character varying(255) NOT NULL,
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

  usertype character varying(60) NOT NULL DEFAULT 'INV'::character varying, --ADM:admin INV:investor COMPMAN:company manager

  CONSTRAINT c_user_key PRIMARY KEY (c_user_id),
  CONSTRAINT c_user_c_country_fk FOREIGN KEY (c_country_id)
      REFERENCES c_country (c_country_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_user_c_region_fk FOREIGN KEY (c_region_id)
      REFERENCES c_region (c_region_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_user_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_user
  OWNER TO tad;




CREATE TABLE c_company
(
  c_company_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  c_user_id character varying(32) NOT NULL,

  name character varying(100) NOT NULL,
  description character varying(255),
  url character varying(120),
  taxid character varying(20),

  address1 character varying(150) NOT NULL,
  address2 character varying(150),

  c_country_id character varying(32) NOT NULL,
  c_region_id character varying(32) NOT NULL,

  city character varying(60) NOT NULL,
  postal character varying(10) NOT NULL,
 
  CONSTRAINT c_company_key PRIMARY KEY (c_company_id),
  CONSTRAINT c_company_c_user_fk FOREIGN KEY (c_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_company_c_country_fk FOREIGN KEY (c_country_id)
      REFERENCES c_country (c_country_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_company_c_region_fk FOREIGN KEY (c_region_id)
      REFERENCES c_region (c_region_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_company_isactive_chk CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_company
  OWNER TO tad;


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
  OWNER TO tad;


CREATE TABLE c_project
(
  c_project_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  name character varying(60) NOT NULL, 
  description text, 
  c_user_id character varying(32) NOT NULL,
  c_company_id character varying(32) NOT NULL,
  c_currency_id character varying(32) NOT NULL,
  
  datecontract timestamp without time zone NOT NULL,
  startdate timestamp without time zone,
  datefinish timestamp without time zone NOT NULL,

  c_projecttype_id character varying(32), --Investment types Buytolet Buytosell DevelLoan
  projectstatus character varying(60) NOT NULL DEFAULT 'PEND'::character varying, --PEND: pending evaluation FU:funding FI:finished

  
  propertytype character varying(60) NOT NULL DEFAULT 'AP'::character varying, --AP:Apartment SUI:Suite BUI:Building ,etc
  qtyproperty numeric NOT NULL DEFAULT 1,

  address1 character varying(150),
  c_country_id character varying(32) NOT NULL,
  c_region_id character varying(32) NOT NULL,
  city character varying(60),

  --DEVELOPMENT LOAN AMTS
  totalyieldperc numeric NOT NULL DEFAULT 1, --total yield
  loanterm numeric NOT NULL DEFAULT 1, --loan term in months
  targetamt numeric NOT NULL DEFAULT 0, --financial goal

  --PAYPAL PAYIN INFORMATION
  payin_paypalusername character varying(60) NOT NULL,

  CONSTRAINT c_project_key PRIMARY KEY (c_project_id),
  CONSTRAINT c_project_c_user FOREIGN KEY (c_user_id)
      REFERENCES c_user (c_user_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE SET NULL,
  CONSTRAINT c_project_company_fk FOREIGN KEY (c_company_id)
      REFERENCES c_company (c_company_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
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
  CONSTRAINT c_project_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_project
  OWNER TO tad;

CREATE TABLE c_file
(
  c_file_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  c_project_id character varying(32),
  name character varying(1000) NOT NULL,
  datatype character varying(32), --PDF, TXT
  documenttype character varying(60) NOT NULL DEFAULT 'DOC_OTHER'::character varying, --DOC_OTHER:Other DOC_PER: Permits
  path character varying(2000) NOT NULL,
  CONSTRAINT c_file_key PRIMARY KEY (c_file_id),
  CONSTRAINT c_file_project_fk FOREIGN KEY (c_project_id)
      REFERENCES c_project (c_project_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT c_file_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_file
  OWNER TO tad;


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
  documenttype character varying(60) DEFAULT 'PASS'::character varying, --PASS:Passport IN:Identification Number
  documentnumber character varying(60),
  c_docimgfront_id character varying(32),
  c_docimgback_id character varying(32),

  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying, --PEND:pending validation VAL:validated SUS:suspended
  validateddate timestamp without time zone,
  validationnotes character varying(255),

  --PAYPAL PAYIN INFORMATION
  payin_paypalusername character varying(60) NOT NULL,

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
  OWNER TO tad;


CREATE TABLE fin_payment_history
(
  fin_payment_history_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
 
  paymentdate timestamp without time zone NOT NULL,
  status character varying(60) NOT NULL,
  type character varying(60) NOT NULL,
  c_currency_id character varying(32) NOT NULL,
  amount numeric NOT NULL,
  fromaccount character varying(60) NOT NULL,
  toaccount character varying(60) NOT NULL,
  description character varying(255) NOT NULL,

  CONSTRAINT fin_payment_history_key PRIMARY KEY (fin_payment_history_id),
  CONSTRAINT fin_payment_history_currency_fk FOREIGN KEY (c_currency_id)
      REFERENCES c_currency (c_currency_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_payment_history_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
)
WITH (
  OIDS=FALSE
);
ALTER TABLE fin_payment_history
  OWNER TO tad;


CREATE TABLE fin_investment
(
  fin_investment_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying, --PEND:pending CONF:confirmed
  c_project_id character varying(32) NOT NULL,
  c_investor_id character varying(32) NOT NULL,
  startdate timestamp without time zone,
  amount numeric NOT NULL,
  fin_payment_history_id character varying(32) NOT NULL,
  CONSTRAINT fin_investment_key PRIMARY KEY (fin_investment_id),
  CONSTRAINT fin_investment_project_fk FOREIGN KEY (c_project_id)
      REFERENCES c_project (c_project_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_investment_investor_fk FOREIGN KEY (c_investor_id)
      REFERENCES c_investor (c_investor_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_investment_payhist_fk FOREIGN KEY (fin_payment_history_id)
      REFERENCES fin_payment_history (fin_payment_history_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_investment_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE fin_investment
  OWNER TO tad;


CREATE TABLE fin_returninvestment_schedule
(
  fin_returninvestment_schedule_id character varying(32) NOT NULL,
  isactive character(1) NOT NULL DEFAULT 'Y'::bpchar,
  created timestamp without time zone NOT NULL DEFAULT now(),
  createdby character varying(32) NOT NULL,
  updated timestamp without time zone NOT NULL DEFAULT now(),
  updatedby character varying(32) NOT NULL,
  status character varying(60) NOT NULL DEFAULT 'PEND'::character varying, --PEND:pending CONF:confirmed
  scheduleddate timestamp without time zone NOT NULL,
  c_investor_id character varying(32) NOT NULL,
  c_project_id character varying(32) NOT NULL,
  amount numeric NOT NULL,
  paymentdate timestamp without time zone,
  fin_payment_history_id character varying(32) NOT NULL,

  CONSTRAINT fin_returninvestment_schedule_key PRIMARY KEY (fin_returninvestment_schedule_id),
  CONSTRAINT fin_returninvestment_schedule_project_fk FOREIGN KEY (c_project_id)
      REFERENCES c_project (c_project_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_returninvestment_schedule_investor_fk FOREIGN KEY (c_investor_id)
      REFERENCES c_investor (c_investor_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_returninvestment_schedule_payhist_fk FOREIGN KEY (fin_payment_history_id)
      REFERENCES fin_payment_history (fin_payment_history_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fin_returninvestment_schedule_isactive_check CHECK (isactive = ANY (ARRAY['Y'::bpchar, 'N'::bpchar]))
 
)
WITH (
  OIDS=FALSE
);
ALTER TABLE fin_returninvestment_schedule
  OWNER TO tad;


