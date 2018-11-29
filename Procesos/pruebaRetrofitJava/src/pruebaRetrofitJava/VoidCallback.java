package pruebaRetrofitJava;

import okhttp3.Headers;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class VoidCallback implements Callback<Void> {

    @Override
    public void onFailure(Call<Void> arg0, Throwable arg1) {
        System.out.println("ERRORRRRR");
    }

    @Override
    public void onResponse(Call<Void> arg0, Response<Void> resp) {

        System.out.println("EXITO");

    }


}
