package src.tugasbesar.models;

import javafx.beans.property.SimpleStringProperty;
import javafx.beans.property.StringProperty;

public class Patient {
    private final StringProperty id;
    private final StringProperty name;
    private final StringProperty age;
    private final StringProperty gender;
    private final StringProperty phone;
    private final StringProperty specialist; // Properti spesialis
    private final StringProperty doctor;     // Properti dokter

    public Patient(String id, String name, String age, String gender, String phone, String specialist, String doctor) {
        this.id = new SimpleStringProperty(id);
        this.name = new SimpleStringProperty(name);
        this.age = new SimpleStringProperty(age);
        this.gender = new SimpleStringProperty(gender);
        this.phone = new SimpleStringProperty(phone);
        this.specialist = new SimpleStringProperty(specialist);
        this.doctor = new SimpleStringProperty(doctor);
    }

    public StringProperty idProperty() { return id; }
    public StringProperty nameProperty() { return name; }
    public StringProperty ageProperty() { return age; }
    public StringProperty genderProperty() { return gender; }
    public StringProperty phoneProperty() { return phone; }
    public StringProperty specialistProperty() { return specialist; }
    public StringProperty doctorProperty() { return doctor; }

    public String getId() { return id.get(); }
    public String getName() { return name.get(); }
    public String getAge() { return age.get(); }
    public String getGender() { return gender.get(); }
    public String getPhone() { return phone.get(); }
    public String getSpecialist() { return specialist.get(); }
    public String getDoctor() { return doctor.get(); }
}
