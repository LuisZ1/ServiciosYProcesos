package Filosofos;

import java.util.ArrayList;

public class GestionFilosofos {

    public ArrayList<Filosofo> generarListaFilosofos(int nFilo){
        ArrayList<Filosofo> listaFilosofos = new ArrayList<Filosofo>();
        int i = nFilo - 1;
        int j = 1;

        listaFilosofos.add(new Filosofo(i, 0));

        for ( i = 0; i < nFilo - 2; i++){
            listaFilosofos.add(new Filosofo(i, j));
            j++;
        }

        listaFilosofos.add(new Filosofo(j, 0));

        return listaFilosofos;
    }

}
