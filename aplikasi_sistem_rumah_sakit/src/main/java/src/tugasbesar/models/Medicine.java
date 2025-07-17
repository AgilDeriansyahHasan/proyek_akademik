// src/tugasbesar/models/Medicine.java
package src.tugasbesar.models;

public class Medicine {
    private String name;
    private double price;

    public Medicine(String name, double price) {
        if (price <= 0) {
            throw new IllegalArgumentException("Harga harus lebih besar dari nol.");
        }
        this.name = name;
        this.price = price;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        if (price <= 0) {
            throw new IllegalArgumentException("Harga harus lebih besar dari nol.");
        }
        this.price = price;
    }

    @Override
    public String toString() {
        return "Medicine{name='" + name + "', price=" + price + "}";
    }
}
