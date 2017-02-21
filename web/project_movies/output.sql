--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

-- Started on 2017-02-18 11:46:24

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'SQL_ASCII';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 13277)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3041 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 185 (class 1259 OID 2195002)
-- Name: genre; Type: TABLE; Schema: public; Owner: xrpbffagqpiytg
--

CREATE TABLE genre (
    genreid integer NOT NULL,
    genrecategory character varying(30) NOT NULL
);


ALTER TABLE genre OWNER TO xrpbffagqpiytg;

--
-- TOC entry 186 (class 1259 OID 2195005)
-- Name: genre_genreid_seq; Type: SEQUENCE; Schema: public; Owner: xrpbffagqpiytg
--

CREATE SEQUENCE genre_genreid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE genre_genreid_seq OWNER TO xrpbffagqpiytg;

--
-- TOC entry 3043 (class 0 OID 0)
-- Dependencies: 186
-- Name: genre_genreid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xrpbffagqpiytg
--

ALTER SEQUENCE genre_genreid_seq OWNED BY genre.genreid;


--
-- TOC entry 187 (class 1259 OID 2195007)
-- Name: ratings; Type: TABLE; Schema: public; Owner: xrpbffagqpiytg
--

CREATE TABLE ratings (
    ratingid integer NOT NULL,
    rating character varying(30) NOT NULL
);


ALTER TABLE ratings OWNER TO xrpbffagqpiytg;

--
-- TOC entry 188 (class 1259 OID 2195010)
-- Name: ratings_ratingid_seq; Type: SEQUENCE; Schema: public; Owner: xrpbffagqpiytg
--

CREATE SEQUENCE ratings_ratingid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ratings_ratingid_seq OWNER TO xrpbffagqpiytg;

--
-- TOC entry 3044 (class 0 OID 0)
-- Dependencies: 188
-- Name: ratings_ratingid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xrpbffagqpiytg
--

ALTER SEQUENCE ratings_ratingid_seq OWNED BY ratings.ratingid;


--
-- TOC entry 189 (class 1259 OID 2195012)
-- Name: rental; Type: TABLE; Schema: public; Owner: xrpbffagqpiytg
--

CREATE TABLE rental (
    rentalid integer NOT NULL,
    movietitle character varying(45) NOT NULL,
    genre_fk integer,
    rating_fk integer,
    description text NOT NULL,
    borrowed boolean NOT NULL,
    owner character varying(30)
);


ALTER TABLE rental OWNER TO xrpbffagqpiytg;

--
-- TOC entry 190 (class 1259 OID 2195018)
-- Name: rental_rentalid_seq; Type: SEQUENCE; Schema: public; Owner: xrpbffagqpiytg
--

CREATE SEQUENCE rental_rentalid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE rental_rentalid_seq OWNER TO xrpbffagqpiytg;

--
-- TOC entry 3045 (class 0 OID 0)
-- Dependencies: 190
-- Name: rental_rentalid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xrpbffagqpiytg
--

ALTER SEQUENCE rental_rentalid_seq OWNED BY rental.rentalid;


--
-- TOC entry 2902 (class 2604 OID 2243109)
-- Name: genre genreid; Type: DEFAULT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY genre ALTER COLUMN genreid SET DEFAULT nextval('genre_genreid_seq'::regclass);


--
-- TOC entry 2903 (class 2604 OID 2243110)
-- Name: ratings ratingid; Type: DEFAULT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY ratings ALTER COLUMN ratingid SET DEFAULT nextval('ratings_ratingid_seq'::regclass);


--
-- TOC entry 2904 (class 2604 OID 2243111)
-- Name: rental rentalid; Type: DEFAULT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY rental ALTER COLUMN rentalid SET DEFAULT nextval('rental_rentalid_seq'::regclass);


--
-- TOC entry 3030 (class 0 OID 2195002)
-- Dependencies: 185
-- Data for Name: genre; Type: TABLE DATA; Schema: public; Owner: xrpbffagqpiytg
--

COPY genre (genreid, genrecategory) FROM stdin;
1	Action
2	Adventure
3	Animation
4	Comedy
5	Documentary
6	Drama
7	Family
8	Fantasy
9	Horror
10	Mystery
11	Romance
12	Sci-Fi
13	Thriller
14	Western
\.


--
-- TOC entry 3046 (class 0 OID 0)
-- Dependencies: 186
-- Name: genre_genreid_seq; Type: SEQUENCE SET; Schema: public; Owner: xrpbffagqpiytg
--

SELECT pg_catalog.setval('genre_genreid_seq', 14, true);


--
-- TOC entry 3032 (class 0 OID 2195007)
-- Dependencies: 187
-- Data for Name: ratings; Type: TABLE DATA; Schema: public; Owner: xrpbffagqpiytg
--

COPY ratings (ratingid, rating) FROM stdin;
1	G
2	PG
3	PG-13
4	TV-14
5	TV-MA
6	Not Rated
\.


--
-- TOC entry 3047 (class 0 OID 0)
-- Dependencies: 188
-- Name: ratings_ratingid_seq; Type: SEQUENCE SET; Schema: public; Owner: xrpbffagqpiytg
--

SELECT pg_catalog.setval('ratings_ratingid_seq', 6, true);


--
-- TOC entry 3034 (class 0 OID 2195012)
-- Dependencies: 189
-- Data for Name: rental; Type: TABLE DATA; Schema: public; Owner: xrpbffagqpiytg
--

COPY rental (rentalid, movietitle, genre_fk, rating_fk, description, borrowed, owner) FROM stdin;
2	The Incredibles	1	2	Meet disneys incredibles	f	zane
3	Inside Out	7	2	Get inside your head	f	zane
4	Zootopia	7	2	What would a world full of talking animals be like?	f	zane
5	Star Wars the Force Awakens	12	3	The lastest Star Wars movie	f	zane
7	Prince of Persia	1	3	The prince of Persia must save the kingdom	f	zane
1	Aladdin	1	1	Aladdin is a street thief, who falls in love with the princess.	f	zane
6	The Nightmare Before Christmas	3	2	A scary movie about Christmas and Halloween getting mixed up.	f	zane
\.


--
-- TOC entry 3048 (class 0 OID 0)
-- Dependencies: 190
-- Name: rental_rentalid_seq; Type: SEQUENCE SET; Schema: public; Owner: xrpbffagqpiytg
--

SELECT pg_catalog.setval('rental_rentalid_seq', 10, true);


--
-- TOC entry 2906 (class 2606 OID 2195024)
-- Name: genre genre_pkey; Type: CONSTRAINT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY genre
    ADD CONSTRAINT genre_pkey PRIMARY KEY (genreid);


--
-- TOC entry 2908 (class 2606 OID 2195026)
-- Name: ratings ratings_pkey; Type: CONSTRAINT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY ratings
    ADD CONSTRAINT ratings_pkey PRIMARY KEY (ratingid);


--
-- TOC entry 2910 (class 2606 OID 2195028)
-- Name: rental rental_pkey; Type: CONSTRAINT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY rental
    ADD CONSTRAINT rental_pkey PRIMARY KEY (rentalid);


--
-- TOC entry 2911 (class 2606 OID 2195029)
-- Name: rental rental_genre_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY rental
    ADD CONSTRAINT rental_genre_fk_fkey FOREIGN KEY (genre_fk) REFERENCES genre(genreid);


--
-- TOC entry 2912 (class 2606 OID 2195034)
-- Name: rental rental_rating_fk_fkey; Type: FK CONSTRAINT; Schema: public; Owner: xrpbffagqpiytg
--

ALTER TABLE ONLY rental
    ADD CONSTRAINT rental_rating_fk_fkey FOREIGN KEY (rating_fk) REFERENCES ratings(ratingid);


--
-- TOC entry 3042 (class 0 OID 0)
-- Dependencies: 575
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO xrpbffagqpiytg;


-- Completed on 2017-02-18 11:46:40

--
-- PostgreSQL database dump complete
--

