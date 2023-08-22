CREATE TABLE user_profile(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        img_url VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE signUp(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(225) NOT NULL,
        username VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        referral_code VARCHAR(225) NOT NULL,
        password VARCHAR(225) NOT NULL,
        code VARCHAR(225) NOT NULL,
        active_plan VARCHAR(225) NOT NULL,
        recover_qst VARCHAR(225) NOT NULL,
        recover_answ VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE login(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        password VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE user_identity(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        verified VARCHAR(225) NOT NULL,
        identity_url VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE user_details(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        name VARCHAR(225) NOT NULL,
        mobile VARCHAR(225) NOT NULL,
        country VARCHAR(225) NOT NULL,
        city VARCHAR(225) NOT NULL,
        zip_code VARCHAR(225) NOT NULL,
        address VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE customer_support(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        username VARCHAR(225) NOT NULL,
        subject VARCHAR(225) NOT NULL,
        priority VARCHAR(225) NOT NULL,
        details VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE user_balance(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        acc_balance VARCHAR(225) NOT NULL,
        referral_code VARCHAR(225) NOT NULL,
        grind_balance VARCHAR(225) NOT NULL,
        referral_balance INT(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE shared_record(
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(225) NOT NULL,
        name VARCHAR(225) NOT NULL,
        amount VARCHAR(225) NOT NULL,
        reciever_address VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE deposite_logs(
        id INT AUTO_INCREMENT PRIMARY KEY,
        amount VARCHAR(225) NOT NULL,
        method VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        created VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE client_contact(
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        subject VARCHAR(225) NOT NULL,
        other VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE withdrawal_logs(
        id INT AUTO_INCREMENT PRIMARY KEY,
        amount VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        method VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        type   VARCHAR(225) NOT NULL,
        bank_name VARCHAR(225) NOT NULL,
        Account_numb VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE plans_logs(
        id INT AUTO_INCREMENT PRIMARY KEY,
        plan_type VARCHAR(225) NOT NULL,
        referral_code VARCHAR(225) NOT NULL,
        timer VARCHAR(225) NOT NULL,
        email VARCHAR(225) NOT NULL,
        amount VARCHAR(225) NOT NULL,
        duration VARCHAR(225) NOT NULL,
        days VARCHAR(225) NOT NULL,
        status VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE plans(
        id INT AUTO_INCREMENT PRIMARY KEY,
        plan_name VARCHAR(225) NOT NULL,
        plan_type VARCHAR(225) NOT NULL,
        price VARCHAR(225) NOT NULL,
        daily_to_up VARCHAR(225) NOT NULL,
        max_price VARCHAR(225) NOT NULL,
        interest VARCHAR(225) NOT NULL,
        compound_interest VARCHAR(225) NOT NULL,
        hash_rate VARCHAR(225) NOT NULL,
        profit_bonus VARCHAR(225) NOT NULL,
        referral_percent VARCHAR(225) NOT NULL,
        reg_date TIMESTAMP
    );

    CREATE TABLE status_1(
        id INT AUTO_INCREMENT PRIMARY KEY,
        aproved VARCHAR(225) NOT NULL
    );

    CREATE TABLE status_2(
        id INT AUTO_INCREMENT PRIMARY KEY,
        pending VARCHAR(225) NOT NULL
    );

    CREATE TABLE referrals(
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount INT(225) NOT NULL,
    name VARCHAR(225) NOT NULL,
    email VARCHAR(225) NOT NULL,
    referrals_code VARCHAR(225) NOT NULL,
    user_name VARCHAR(225) NOT NULL,
    parent_code VARCHAR(225) NOT NULL,
    updated TIMESTAMP
);

CREATE TABLE referral_earnings(
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount INT(225) NOT NULL,
    name VARCHAR(225) NOT NULL,
    email VARCHAR(225) NOT NULL,
    referrals_code VARCHAR(225) NOT NULL,
    user_name VARCHAR(225) NOT NULL,
    updated TIMESTAMP
);

CREATE TABLE admin(
    id INT(12) PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(225) NOT NULL,
    email VARCHAR(225) NOT NULL,
    password VARCHAR(225) NOT NULL,
    img_url VARCHAR(225) NOT NULL,
    date TIMESTAMP
);

CREATE TABLE client_contact(
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(225) NOT NULL,
    email VARCHAR(225) NOT NULL,
    subject VARCHAR(225) NOT NULL,
    other VARCHAR(225) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE active_plan(
    id INT AUTO_INCREMENT PRIMARY KEY,
    active_plan VARCHAR(225) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('STARTER PARK', 'For 2 month(s)', '5,000','1.5% daily top up',
    '$5,000 max price', 'Interest 14%', 'Compound interest 4%', 'Hashrate 5Ph/s', '4% Profit bonus', '2% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('PREMIUM PARK', 'For 3 month(s)', '15,000','2.5% daily top up',
    '$15,000 max price', 'Interest 14%', 'Compound interest 8%', 'Hashrate 5Ph/s', '5% Profit bonus', '5% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('GOLD PARK', 'For 4 month(s)', '30,000','4.5% daily top up',
    '$30,000 max price', 'Interest 14%', 'Compound interest 10%', 'Hashrate 8Ph/s', '8% Profit bonus', '10% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('DIAMOND PARK', 'For 5 month(s)', '54,000','6.0% daily top up',
    '$54,000 max price', 'Interest 15%', 'Compound interest 10%', 'Hashrate 8Ph/s', '10% Profit bonus', '12% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('SILVER PARK', 'For 7 month(s)', '74,000','6.5% daily top up',
    '$74,000 max price', 'Interest 17%', 'Compound interest 12%', 'Hashrate 10Ph/s', '12% Profit bonus', '14% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('MASTER PARK', 'For 9 month(s)', '185,000','7.5% daily top up',
    '$185,000 max price', 'Interest 20%', 'Compound interest 14%', 'Hashrate 12Ph/s', '15% Profit bonus', '20% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('PLATINUM PARK', 'For 10 month(s)', '122,000','8.5% daily top up',
    '$122,000 max price', 'Interest 18%', 'Compound interest 12%', 'Hashrate 11Ph/s', '13% Profit bonus', '18% referral percent');

INSERT INTO plans(plan_name, plan_type, price, daily_to_up, max_price, interest, compound_interest, 
    hash_rate, profit_bonus, referral_percent) VALUES('SUPPER PARK', 'For 12 month(s)', '225,000','9.5% daily top up',
    '$225,000 max price', 'Interest 22%', 'Compound interest 15%', 'Hashrate 15Ph/s', '18% Profit bonus', '22% referral percent'); 
    