module src.tugasbesar {
    requires javafx.controls;
    requires javafx.fxml;
    requires java.sql; // JDBC untuk SQL

    opens src.tugasbesar.controllers to javafx.fxml;
    opens src.tugasbesar to javafx.fxml;
    opens src.tugasbesar.models to javafx.base;
    exports src.tugasbesar;
    exports src.tugasbesar.controllers;
}
