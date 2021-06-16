CREATE TABLE Nutrition
(
    nutrient_name varchar(25) NOT NULL,
    Calories NUMBER(7) NOT NULL,
    N_description varchar(200),
    constraint PK_N PRIMARY KEY(nutrient_name)
);

CREATE TABLE Diet_Plan
(
    Diet_id NUMBER(7)  NOT NULL,
    Diet_name varchar(25) NOT NULL,
    diet_weeks varchar(5) NOT NULL,
    diet_type varchar(4) NOT NULL,
    constraint PK_DP PRIMARY KEY(Diet_id)
);

CREATE TABLE Member
(
    member_id int NOT NULL,
    M_password varchar(50) NOT NULL,
    planID int NOT NULL,
    member_type varchar(25) NOT NULL,
    Age NUMBER(3) NOT NULL,
    gender varchar(6) NOT NULL,
    constraint PK_M PRIMARY KEY(member_id)
);
CREATE SEQUENCE member_seq START WITH 1;

CREATE OR REPLACE TRIGGER member_bir
BEFORE INSERT ON Member
FOR EACH ROW

BEGIN 
    SELECT workout_seq.NEXTVAL
    INTO :new.member_id
    FROM DUAL;
END;
/

CREATE TABLE equipment
(
    equipment_name varchar(25) NOT NULL,
    equipment_details varchar(200),
    constraint PK_eq PRIMARY KEY(equipment_name)
);

CREATE TABLE Exercise
(
    exercise_name varchar(25) NOT NULL,
    freq NUMBER(7) NOT NULL,
    exercise_equipment varchar(25) NOT NULL,
    exercise_time varchar(5),
    constraint PK_ex PRIMARY KEY(exercise_name),
    CONSTRAINT FK_ex_eq FOREIGN KEY (exercise_equipment) REFERENCES equipment(equipment_name)
);

CREATE TABLE Muscle_group
(
    muscle_group varchar(25) NOT NULL,
    M_Description varchar(200),
    exercise_name varchar(25) NOT NULL,
    constraint PK_Mg PRIMARY KEY(muscle_group),
    CONSTRAINT FK_Mg_ex FOREIGN KEY (exercise_name) REFERENCES Exercise(exercise_name)
);

CREATE TABLE nutrient_diet
(
    diet_id NUMBER(7) NOT NULL,
    day int NOT NULL,
    nutrient_name varchar(25) NOT NULL,
    constraint PK_Nd PRIMARY KEY(day, diet_id),
    CONSTRAINT FK_nd_nu FOREIGN KEY (nutrient_name)
    REFERENCES Nutrition(nutrient_name),
    CONSTRAINT FK_Nd_DP FOREIGN KEY (diet_id) REFERENCES Diet_Plan(Diet_id)
);

CREATE TABLE workout_plan
(
    planID int NOT NULL,
    workout_name varchar(25) NOT NULL,
    Diet_id NUMBER(7) NOT NULL,
    Age NUMBER(3) NOT NULL,
    gender varchar(6) NOT NULL,
    plan_type varchar(5) NOT NULL,
    BMI NUMBER(7) NOT NULL,
    constraint PK_Wp PRIMARY KEY(planID),
    CONSTRAINT FK_WP_DP FOREIGN KEY (Diet_id) REFERENCES Diet_Plan(Diet_id)
);

CREATE SEQUENCE workout_seq START WITH 1;

CREATE OR REPLACE TRIGGER workout_bir
BEFORE INSERT ON workout_plan
FOR EACH ROW

BEGIN 
    SELECT workout_seq.NEXTVAL
    INTO :new.planID
    FROM DUAL;
END;
/

CREATE TABLE muscle_workout
(
    planID NUMBER(7) NOT NULL,
    muscle_group varchar(25) NOT NULL,
    Day NUMBER(2) NOT NULL,
    workout_Time time NOT NULL,
    constraint PK_mW PRIMARY KEY(planID),
    constraint PK_musW PRIMARY KEY(muscle_group),
    CONSTRAINT FK_MW_WP FOREIGN KEY (planID)
    REFERENCES workout_plan(planID),
    CONSTRAINT FK_MW_MG FOREIGN KEY (muscle_group) REFERENCES Muscle_group(muscle_group)
);

CREATE TABLE Log
(
    sr NUMBER(7) NOT NULL,
    member_id NUMBER(7) NOT NULL,
    workout_perc FLOAT NOT NULL,
    diet_perc FLOAT NOT NULL,
    BMI NUMBER(7) NOT NULL,
    Weight NUMBER(7) NOT NULL,
    muscle mass NUMBER(7) NOT NULL,
    Log_Date Date,
    constraint PK_L PRIMARY KEY(sr),
    CONSTRAINT FK_LG_Mr FOREIGN KEY (member_id) REFERENCES Member(member_id)
);


CREATE SEQUENCE log_seq START WITH 1;

CREATE OR REPLACE TRIGGER log_bir
BEFORE INSERT ON Log
FOR EACH ROW

BEGIN 
    SELECT log_seq.NEXTVAL
    INTO :new.sr
    FROM DUAL;
END;
/