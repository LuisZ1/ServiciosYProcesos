package pruebaRetrofitJava.Libro;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import okhttp3.Headers;


public class LibroCallback implements Callback<Libro>{

	@Override
	public void onFailure(Call<Libro> arg0, Throwable arg1) {
		System.out.println("ERRORRRRR");
	}

	@Override
	public void onResponse(Call<Libro> arg0, Response<Libro> resp) {
		// TODO Auto-generated method stub
		
	Libro libro;
	String contentType;
	int code;
	String message;
	boolean isSuccesful;
	
	libro = resp.body();
	
	Headers cabeceras = resp.headers();
	contentType = cabeceras.get("Content-Type");
	code = resp.code();
	message = resp.message();
	isSuccesful = resp.isSuccessful();
	
	System.out.println(libro.getCodigo()+" "+libro.getTitulo()+" "+libro.getNumpag());

	}
	

}
