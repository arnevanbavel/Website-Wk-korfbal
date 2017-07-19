using UnityEngine;
using System.Collections;

public class PowerUpScript : MonoBehaviour {

	HUDScript hud;

	void OnTriggerEnter2D(Collider2D other)
	{
		hud = GameObject.Find("Main Camera").GetComponent<HUDScript>();
		if (other.tag == "Player") 
		{
			if (this.name == "GhostBall") {
				mEnabeler(other);
			}
			if (this.name == "TimerBall"){
				hud.TimerIncrease(5);			
			}
			if (this.name == "Goal"){
				hud.TimerReset();
			}
			hud.IncreaseScore(10);
			Destroy(this.gameObject);
		}
	}

	IEnumerator mEnabeler(Collider2D other)
	{			
		other.collider2D.enabled = false;
		other.gameObject.renderer.material.color = new Color(44, 0, 221, 165);
		yield return new WaitForSeconds(2f);
		other.collider2D.enabled = true;
		other.gameObject.renderer.material.color = new Color(255, 255, 255, 255);

	}
}
