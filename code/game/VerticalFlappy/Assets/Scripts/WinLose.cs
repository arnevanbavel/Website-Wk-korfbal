using UnityEngine;
using System.Collections;

public class WinLose : MonoBehaviour {
	HUDScript HUD;
	bool power;
	GameObject BreakableEnemy;

	// Use this for initialization
	void Start () {
		HUD = GameObject.Find ("Main Camera").GetComponent<HUDScript> ();
		BreakableEnemy = GameObject.FindGameObjectWithTag ("BreakableEnemy");
	}
	
	// Update is called once per frame
	void Update () {
		if ( HUD.Timer == 0)
		{
			StartCoroutine ("mLose");
		}
		if (this.gameObject.transform.position.x > 7.5 || 
						this.gameObject.transform.position.x < -7.5 || 
						this.gameObject.transform.position.y > 6) {
						Destroy (this.gameObject);
						StartCoroutine ("mLose");
				}
		}

	void OnCollisionEnter2D(Collision2D coll) {
				if (coll.gameObject.tag == "Enemy") {
						StartCoroutine ("mLose");
				}
		if (coll.gameObject.tag == "BreakableEnemy") {
						if (BreakableEnemy.GetComponent<movement> ().power == false) {
								StartCoroutine ("mLose");
						}
						Destroy (BreakableEnemy);
				}

		if (coll.gameObject.tag == "Finish") {
			StartCoroutine ("mWin");
		}
	}
	
		IEnumerator mLose()
		{
		yield return new WaitForSeconds(0.5f);
		Application.LoadLevel ("GameOver");
		Destroy (this.gameObject);

	}

	IEnumerator mWin()
	{
		yield return new WaitForSeconds(0.5f);
		Destroy (this.gameObject);
		Application.LoadLevel ("Win");
	}
}
