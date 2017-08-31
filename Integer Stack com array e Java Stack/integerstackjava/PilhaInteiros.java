package integerstackjava;

import java.util.Stack;

public class PilhaInteiros {

    private Stack<Integer> s;
    private Stack<Integer> minStack;

    public PilhaInteiros() {
        s = new Stack<Integer>();
        minStack = new Stack<Integer>();
    }

    // Método Push (Adicionar na pilha)
    public void push(int k) {

        if (minStack.isEmpty()) {
            minStack.push(k);
        } else if (k <= minStack.peek()) {
            minStack.push(k);
        }
        s.push(k);
    }

    // Método Pop - (Remover do Topo)
    public void pop() {

        int popped;
        if (!s.isEmpty()) {
            popped = s.pop();
        } else {
            popped = -1;
        }

        if (popped == min()) {
            minStack.pop();
        }
    }

    // Método Min (Retorna o menor valor da pilha)
    public int min() {
        if (!minStack.isEmpty()) {
            return minStack.peek();
        } else {
            return Integer.MIN_VALUE;
        }
    }

    public int peek() {
        return s.peek();
    }
}
