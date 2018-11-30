package pruebaRetrofitJava.Pedidos;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

/**
 * Created by lzumarraga on 30/11/18.
 */

public class Producto {

    @SerializedName("cod")
    @Expose
    private String cod;

    @SerializedName("nombre")
    @Expose
    private String nombre;

    @SerializedName("precio")
    @Expose
    private Integer precio;

    public Producto(String cod, String nombre, Integer precio) {
        this.cod = cod;
        this.nombre = nombre;
        this.precio = precio;
    }

    public String getCod() {
        return cod;
    }

    public void setCod(String cod) {
        this.cod = cod;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Integer getPrecio() {
        return precio;
    }

    public void setPrecio(Integer precio) {
        this.precio = precio;
    }

}
