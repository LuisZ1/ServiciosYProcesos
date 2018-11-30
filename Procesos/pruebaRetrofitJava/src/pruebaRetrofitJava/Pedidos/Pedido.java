package pruebaRetrofitJava.Pedidos;

import java.util.List;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

/**
 * Created by lzumarraga on 30/11/18.
 */
public class Pedido {

    @SerializedName("id")
    @Expose
    private String id;

    @SerializedName("productos")
    @Expose
    private List<Producto> productos = null;

    public Pedido(String id, List<Producto> productos) {
        this.id = id;
        this.productos = productos;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public List<Producto> getProductos() {
        return productos;
    }

    public void setProductos(List<Producto> productos) {
        this.productos = productos;
    }

}

