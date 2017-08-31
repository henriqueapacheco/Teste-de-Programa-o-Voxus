package integerstack;

public class PilhaInteiros {

    private Integer[] elementos;
    private Integer[] elementosMin;
    private int size;
    private int minSize;

    public PilhaInteiros(int capacity) {
        elementos = new Integer[Math.abs(capacity)];
        elementosMin = new Integer[Math.abs(capacity)];
        size = 0;
        minSize = 0;
    }

    public void push(Integer element) {
        if (element == null) {
            throw new IllegalArgumentException("O elemento não pode ser nulo!");
        }
        size++;
        elementos[size - 1] = element;

        if (minSize <= 0) {
            elementosMin[0] = element;
            minSize++;
        } else {
            if (element <= elementosMin[minSize - 1]) {
                elementosMin[minSize] = element;
                minSize++;
            }
        }
    }

    public void pop() {
        int popped;
        if (size != 0) {
            popped = elementos[size - 1];
            elementos[size - 1] = null;
            size--;
        } else {
            popped = -1;
        }
        if (popped == min()) {
            elementosMin[minSize - 1] = null;
            minSize--;
        }

    }

    public Integer min() {
        if (minSize != 0) {
            return elementosMin[minSize - 1];
        } else {
            return Integer.MIN_VALUE;
        }
    }

    public boolean isEmpty() {
        return size <= 0;
    }

    public boolean isEmpty2() {
        return minSize <= 0;
    }

    public int getTopPosition() {
        if (isEmpty()) {
            return 0;
        }
        return size - 1;
    }

    public int getTopPosition2() {
        if (isEmpty2()) {
            return 0;
        }
        return minSize - 1;
    }

    public Integer peek() {
        if (isEmpty()) {
            return null;
        } else {
            return elementos[size - 1];
        }
    }
}
