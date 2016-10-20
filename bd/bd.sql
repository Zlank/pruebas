drop table if exists personas cascade;

create table personas (
    id      bigserial    constraint pk_personas primary key,
    nombre  varchar(100) not null,
    anyo    numeric(4)
);
